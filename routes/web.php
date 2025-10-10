<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


use App\Http\Controllers\CameraCatalogController;

Route::get('/', [CameraCatalogController::class, 'index'])->name('home');
Route::get('/camera/{id}', [CameraCatalogController::class, 'show'])->name('camera.show');