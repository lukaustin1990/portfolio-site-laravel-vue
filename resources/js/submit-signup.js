import axios from "axios";
import { createApp } from "vue/dist/vue.esm-bundler.js";

document.addEventListener("DOMContentLoaded", function() {
    const el = document.getElementById("vue-auth-signup");

    if (el) {
        createApp({
            data() {
                return {
                    email: "",
                    password: "",
                    password_confirmation: ""
                };
            },
            methods: {
                submitSignup() {
                    console.log(this.email, this.password, this.password_confirmation);

                    // Web side validation
                    if (this.password.length < 8) {
                        alert("Password must be at least 8 characters long!");
                        return;
                    }

                    if (this.password !== this.password_confirmation) {
                        alert("Passwords do not match!");
                        return;
                    }

                    // Send the POST request to the server
                    axios.post("/signup", {
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation
                    }, {
                        withCredentials: true
                    }).then(response => {
                        sessionStorage.setItem("flash_message", JSON.stringify({ type: "success", message: "Signup successful! Please log in." }));
                        window.location.reload();
                    }).catch(error => {
                        alert("Signup failed: " + error.response.data.message);
                    });
                }
            }
        }).mount(el);
    }
});