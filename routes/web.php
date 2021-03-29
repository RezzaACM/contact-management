<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AgentAssignmentController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MyAassignController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/create-user', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/authenticate', [LoginController::class, 'authenticate']);


Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/contact-management', [ContactController::class, 'index'])->middleware('auth');
Route::post('/create-contact', [ContactController::class, 'store'])->middleware('auth');
Route::post('/update-contact', [ContactController::class, 'update'])->middleware('auth');
Route::get('/customers', [ContactController::class, 'customers'])->middleware('auth');
Route::post('/customer-delete', [ContactController::class, 'delete'])->middleware('auth');
Route::get('/customer/{id}', [ContactController::class, 'customer'])->middleware('auth');
Route::get('/admin-management', [AdminController::class, 'index'])->middleware('auth');
Route::get('/assignment-management', [AgentAssignmentController::class, 'index'])->middleware('auth');
Route::get('/assign-user', [AgentAssignmentController::class, 'assignUser'])->middleware('auth');
Route::post('/create-assign', [AgentAssignmentController::class, 'addAssign'])->middleware('auth');
Route::get('/my-assignment', [MyAassignController::class, 'index'])->middleware('auth');