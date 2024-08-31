<?php

use App\Http\Controllers\MenuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return 'test';
});
Route::get('/menus', [MenuController::class, 'index']);
Route::get('/parent_menus', [MenuController::class, 'parentNode']);
Route::post('/menus/create_main', [MenuController::class, 'createMain']);
Route::post('/menus/create_sub', [MenuController::class, 'createSub']);
Route::put('/menus/{menu}', [MenuController::class, 'update']);
// Route::get('/posts/{post}/comments', [MenuController::class, 'comments']);
