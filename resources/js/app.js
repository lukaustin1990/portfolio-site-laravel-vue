// Style imports
import "bootstrap/dist/css/bootstrap.min.css";

// Javascript imports
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import { checkFlashMessage } from "./functions-checkFlashMessage";
import { addToBasket, removeFromBasket, openBasket, updateBasketCount } from "./functions-basket";

// Vue imports
import { createApp } from "vue";
import ProductList from "./components/vue-product-list.vue";
import Basket from "./components/vue-basket.vue";

const basketApp = createApp(Basket).mount("#vue-basket");

// TODO - move this to a new file so it does not try to mount on every page
createApp(ProductList).mount("#vue-product-list");

document.addEventListener("DOMContentLoaded", function() {
    //sessionStorage.setItem("flash_message", JSON.stringify({ type: "success", message: "Welcome to the site!" }));
    checkFlashMessage();
    updateBasketCount();
    document.getElementById("basket-open").addEventListener("click", handleOpenBasket);
});

async function handleOpenBasket() {    
    openBasket(basketApp);
}

function handleAddToBasket(productId) {
    addToBasket(productId);
}

function handleRemoveFromBasket(productId) {
    removeFromBasket(productId);
}