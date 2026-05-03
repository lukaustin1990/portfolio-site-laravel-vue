<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get("/", function () {
    return view("home");
});

Route::get("/products", function () {
    return view("products");
});

Route::get("/about", function () {
    return view("about");
});

// Authentication routes
Route::post("/login", [UserController::class, "login"])->name("login");

Route::post("/logout", [UserController::class, "logout"])->name("logout");

Route::post("/signup", [UserController::class, "signup"])->name("signup");

// Admin routes
Route::get("/admin", function () {
    return view("admin.admin");
});

Route::get("/admin/products", function () {
    return view("admin.products");
});
