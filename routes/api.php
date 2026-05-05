<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProductController;

    Route::get("/products", [ProductController::class, "index"]);
    Route::post('/products', [ProductController::class, "api_insert"]);
    Route::put('/products/{id}', [ProductController::class, "api_update"]);
    Route::delete('/products/{id}', [ProductController::class, "api_delete"]);
        
    Route::get("/test", function () {dd('test');});
    