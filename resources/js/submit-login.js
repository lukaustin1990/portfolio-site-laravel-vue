import axios from "axios";
import { createApp } from "vue/dist/vue.esm-bundler.js";

document.addEventListener("DOMContentLoaded", function() {
    const el = document.getElementById("vue-auth-login");

    if (el) {
        createApp({
            data() {
                return {
                    email: "",
                    password: "",
                    remember: false
                };
            },
            methods: {
                submitLogin() {
                    // Check if email and password are provided before making the request
                    if (!this.email || !this.password) {
                        loginError("Please enter both email and password!");
                        return;
                    }

                    // Check if email format is valid (basic check)
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(this.email)) {
                        loginError("Please enter a valid email address!");
                        return;
                    }

                    axios.post("/login", {
                        email: this.email,
                        password: this.password,
                        remember: this.remember
                    }, {
                        withCredentials: true
                    }).then(response => {
                        window.location.reload();
                    }).catch(error => {
                        this.password = ""; // Clear password field on error                        

                        // Show error message in login modal instead of alert
                        const errorMessage = error.response?.data?.message || "An error occurred during login.";
                        loginError(errorMessage);
                    });
                }
            }
        }).mount(el);
    }
});

function loginError(message) {
    /* Example of error div in the login modal:
    <div id="login-error" class="invalid-feedback d-none">
        Invalid email or password.
    </div>
    */
   
    console.log("Login error:", message); // Log the error message for debugging

    const errorDiv = document.getElementById("login-error");
    if (errorDiv) {
        console.log("Found error div, displaying message."); // Log when the error div is found for debugging
        errorDiv.innerHTML = "<i class=\"fas fa-exclamation-triangle\"></i> " + message;
        errorDiv.classList.remove("d-none");
        errorDiv.classList.add("d-block");
    }
}