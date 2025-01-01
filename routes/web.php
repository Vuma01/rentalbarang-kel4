<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LogPinjamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/dashboard', [UserController::class, 'dashboard']);
Route::get('/users', [UserController::class, 'listUsers']);
Route::get('/users-pending', [UserController::class, 'pendingUsers']);
Route::get('/users/borrowing', [UserController::class, 'borrowingUsers']);
Route::post('/approve-item-user/{id}', [UserController::class, 'approveLoan']);
Route::post('/reject-item-user/{id}', [UserController::class, 'rejectLoan']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);


Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/add-category', [CategoryController::class, 'create']);
Route::post('/add-category', [CategoryController::class, 'store']);
Route::delete('/delete-category/{slug}', [CategoryController::class, 'destroy']);
Route::get('/edit-category/{slug}', [CategoryController::class, 'edit']);
Route::post('/edit-category/{slug}', [CategoryController::class, 'update']);


Route::get('/items', [ItemController::class, 'index']);
Route::get('/add-item', [ItemController::class, 'create']);
Route::post('/add-item', [ItemController::class, 'store']);
Route::get('/edit-item/{slug}', [ItemController::class, 'edit']);
Route::post('/edit-item/{slug}', [ItemController::class, 'update']);
Route::delete('/delete-item/{slug}', [ItemController::class, 'destroy']);



Route::delete('/log-pinjaman/{id}', [LogPinjamController::class, 'destroy']);

});


// Route::get('/profile', [UserController::class, 'profile']);

Route::middleware(['auth', 'user'])->group(function () {
Route::get('/user-items', [UserItemController::class, 'index']);
Route::get('/user-items/{item}', [UserItemController::class, 'detail']);
Route::post('/user-items/{item}/pinjam', [UserItemController::class, 'pinjam']);
Route::get('/user-item/status', [UserItemController::class, 'status']);
});
// Route::get('/', function () {
//     return view('welcome');
// });


