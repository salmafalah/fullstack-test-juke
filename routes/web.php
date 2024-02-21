<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use PhpParser\Node\Stmt\Return_;

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

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/login', function () {
    return view('auth/login')->name('login');
});

Route::post('/loginPost', [AuthController::class, 'login']);

Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/home', function () {
    return view('profiles/view');
});

Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'view']);
            Route::get('/create', function () {
                return view('profiles.create');
            });
            Route::post('/add', [ProfileController::class, 'add']);
            Route::get('/edit/{id}', [ProfileController::class, 'edit']);
            Route::post('/update/{id}', [ProfileController::class, 'update']);
            Route::get('/delete/{id}', [ProfileController::class, 'delete']);
        });
    });
