<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/types', function () {
//     dd('test api');
// });

 Route::middleware(['auth:sanctum'])->group(function(){

    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::post('/types', [TypeController::class, 'store']);
    Route::patch('/types/{id}', [TypeController::class, 'update'])->middleware('penjual-baju');
    Route::delete('/types/{id}', [TypeController::class, 'destroy'])->middleware('penjual-baju');
    Route::post('/review', [ReviewController::class, 'store']);


 });


 Route::get('/types', [TypeController::class, 'index']);
 Route::get('/types/{id}', [TypeController::class, 'show']);
 Route::get('/types2/{id}', [TypeController::class, 'show2']);
 Route::post('/login', [AuthenticationController::class, 'login']);



//  Route::get('/logout', [AuthenticationController::class, 'logout']);
//  // route untuk mendapatkan data user yang sedang login
//  Route::get('/me', [AuthenticationController::class, 'me']);
//  // route untuk create data
//  Route::post('/posts', [PostController::class, 'store']);
//  // ini untuk update data
//  Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware('pemilik-postingan');
//  Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('pemilik-postingan');
//  Route::post('/comment', [CommentController::class, 'store']);
//  Route::patch('/comment/{id}', [CommentController::class, 'update'])->middleware('pemilik-komentar');
//  Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->middleware('pemilik-komentar');