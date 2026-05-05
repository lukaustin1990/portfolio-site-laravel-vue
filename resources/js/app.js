import "bootstrap/dist/css/bootstrap.min.css";
//import "bootstrap/dist/js/bootstrap.bundle.min.js";
import { checkFlashMessage } from "./functions-checkFlashMessage";

import { createApp } from "vue";
import ProductList from "./components/vue-product-list.vue";

createApp(ProductList).mount("#vue-product-list");

document.addEventListener("DOMContentLoaded", function() {
    //sessionStorage.setItem("flash_message", JSON.stringify({ type: "success", message: "Welcome to the site!" }));
    checkFlashMessage();
});