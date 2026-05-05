import { loadFlashMessage } from "./functions-loadFlashMessage";

export function checkFlashMessage() {
    const msg = sessionStorage.getItem("flash_message");

    if (msg) {
        const { type, message } = JSON.parse(msg);
        loadFlashMessage(type, message);

        // Clear the flash message from session storage after displaying it
        sessionStorage.removeItem("flash_message");
    }
}