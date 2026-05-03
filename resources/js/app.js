import "bootstrap/dist/css/bootstrap.min.css";
//import "bootstrap/dist/js/bootstrap.bundle.min.js";
import * as bootstrap from "bootstrap";

import { createApp } from "vue";
import ProductList from "./components/vue-product-list.vue";

createApp(ProductList).mount("#vue-product-list");

document.addEventListener("DOMContentLoaded", function() {
    //sessionStorage.setItem("flash_message", JSON.stringify({ type: "success", message: "Welcome to the site!" }));
    checkFlashMessage();
});

function checkFlashMessage() {
    const msg = sessionStorage.getItem("flash_message");

    if (msg) {
        const { type, message } = JSON.parse(msg);
        loadFlashMessage(type, message);

        // Clear the flash message from session storage after displaying it
        sessionStorage.removeItem("flash_message");
    }
}

function loadFlashMessage(type, message) {
    // Show Modal
    const modalEl = document.getElementById("bs-modal-message");
    const modal = new bootstrap.Modal(modalEl);

    // Set message content and styling
    const messageElement = modalEl.querySelector("#bs-modal-message-text");
    messageElement.textContent = message;
    
    const modalBody = modalEl.querySelector(".modal-body");
    modalBody.className = `modal-body mb-0 alert alert-${type}`;

    modal.show();
}