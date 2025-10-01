<?php

use App\Http\Controllers\ItemBrandController\ItemBrandController;
use App\Http\Controllers\ItemCategoryController\ItemCategoryController;
use App\Http\Controllers\ItemMasterController\ItemMasterController;
use App\Http\Controllers\ProductController\ProductController;
use App\Models\ItemMaster\ItemMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('user', function (Request $request) {
    $user = Auth::user();
    return response()->json([
        "user" => $user
    ]);
})->middleware('auth:sanctum');
// Route::resource('products', ProductController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('item-master', ItemMasterController::class);
    Route::resource('item-brand', ItemBrandController::class);
    Route::resource('item-category', ItemCategoryController::class);
});
