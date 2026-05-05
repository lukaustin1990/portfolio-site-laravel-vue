import * as bootstrap from "bootstrap";

export function loadFlashMessage(type, message) {
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