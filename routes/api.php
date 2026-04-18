<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Api\ProductController;

    Route::get("/products", [ProductController::class, "index"]);

    Route::get("/products/{id}", [ProductController::class, "show"]);
    Route::post('/products', [ProductController::class, "insert"]);
    Route::put('/products/{id}', [ProductController::class, "update"]);
    Route::delete('/products/{id}', [ProductController::class, "delete"]);
        
    Route::get("/test", function () {dd('test');});
    