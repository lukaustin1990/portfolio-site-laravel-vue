<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get("/", function () {
    return view("home");
});

Route::get("/about", function () {
    return view("about");
});

// Product routes
Route::get("/products", function () {
    return view("products");
})->name("products");

Route::get("/products/{product}", [ProductController::class, "show"])->name("product.show");

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
