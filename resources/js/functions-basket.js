import axios from "axios";
import { loadFlashMessage } from "./functions-loadFlashMessage";
import * as bootstrap from "bootstrap";

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

    updateBasketCount();
}

export async function removeFromBasket(productId) {
    // Send AJAX request to remove product from basket
    axios.post("/basket/remove", { product_id: productId })
        .then(response => {
            // Handle success (e.g., show a flash message)
            loadFlashMessage("success", "Product removed from basket!");
        })
        .catch(error => {
            // Handle error (e.g., show an error flash message)
            loadFlashMessage("danger", "Failed to remove product from basket.");
        }); 
    
    updateBasketCount();
}

export async function updateBasketCount(basketProducts) {
    if (!basketProducts) {
        basketProducts = await getBasketProducts();
    }

    if (!basketProducts) {
        return;
    }

    //console.log(basketProducts);

    updateBasketCountDirectly(getBasketCount(basketProducts));
}

export function updateBasketCountDirectly(basketCount) {
    document.getElementById("basket-count").textContent = basketCount;
}

export function getBasketCount(basketProducts) {
    return basketProducts.length;
}

export async function getBasketProducts() {
    return axios.get("/basket")
        .then(response => {
            return response.data; // Return the basket products
        })
        .catch(error => {
            return false; // Return false on error
        });
}

export async function openBasket(basketApp) {
    // Open the basket modal
    var basketModal = new bootstrap.Modal(document.getElementById("bs-modal-basket"));
    basketModal.show();
    
    const basketCount = await basketApp.loadBasket();

}