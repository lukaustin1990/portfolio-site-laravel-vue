import axios from "axios";
import { createApp } from "vue/dist/vue.esm-bundler.js";

document.addEventListener("DOMContentLoaded", function() {
    const el = document.getElementById("vue-auth-logout");

    if (el) {
        createApp({
            methods: {
                submitLogout() {
                    axios.post("/logout", {}, {
                        withCredentials: true
                    }).then(response => {
                        // Set flash message in session storage and reload page to show it
                        sessionStorage.setItem("flash_message", JSON.stringify({ type: "success", message: "Logged out successfully." }));
                        window.location.reload();
                    }).catch(error => {
                        // Display message modal now, no need to reload page
                        errorMessage = error.response?.data?.message || "An error occurred during logout.";
                        loadFlashMessage("danger", errorMessage);
                    });
                }
            }
        }).mount(el);
    }
});