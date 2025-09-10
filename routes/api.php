<?php

use App\Http\Controllers\ItemMasterController\ItemMasterController;
use App\Http\Controllers\ProductController\ProductController;
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
});
