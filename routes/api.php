<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// importo il controller
use App\Http\Controllers\Api\ProjectController as ProjectController;
// importo il controller
use App\Http\Controllers\Api\LeadController as LeadController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// creo la rotta
Route::get('/posts/{slug}', [ProjectController::class, 'show'])->name('single_post');
Route::get('/posts',[ProjectController::class, 'index'])->name('posts');
Route::get('/contacts', [LeadController::class, 'store'])->name('send_email');
