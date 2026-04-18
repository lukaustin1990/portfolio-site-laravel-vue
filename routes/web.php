<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("home");
});

Route::get("/products", function () {
    return view("products");
});

Route::get("/about", function () {
    return view("about");
});

Route::get("/admin", function () {
    return view("admin.admin");
});

Route::get("/admin/products", function () {
    return view("admin.products");
});