import axios from "axios";
import { loadFlashMessage } from "./functions-loadFlashMessage";

export function addToBasket(productId) {
    // Send AJAX request to add product to basket
    axios.post("/basket/add", { product_id: productId })
        .then(response => {
            // Handle success (e.g., show a flash message)
            loadFlashMessage("success", "Product added to basket!");
        })
        .catch(error => {
            // Handle error (e.g., show an error flash message)
            loadFlashMessage("danger", "Failed to add product to basket.");
        });
}