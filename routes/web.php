<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

// Route::get();
// Route::post();
// Route::put();
// Route::patch();
// Route::delete();
// Route::options();

//Common routes naming

//index - show all data or students
//show - show a single data or students
//create - show a form to a new user
//store - store a data
//edit - show form to a data
//update - update a data
//destroy - destroy a data


Route::get('/', [StudentController::class, 'index']);
Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login']);