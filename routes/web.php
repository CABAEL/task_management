<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//authenticate user
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::post('/signup', [LoginController::class, 'signup'])->name('signup');

Route::get('/logout', [LogoutController::class, 'logout_user'])->name('logout');

Route::get('/login', function () {
    return view('login');
})->middleware('verifyLogin')->name('login');

Route::get('/getTask', [TaskController::class, 'getTask'])->middleware('auth');

Route::get('/', function () {
    return redirect('login');
});

Route::get('/addTask', function () {
    return view('create_task_form');
});

Route::get('/signupform', function () {
    return view('signup');
})->middleware('verifyLogin')->name('signupform');

Route::post('/save-tasks', [TaskController::class, 'store'])->middleware('auth')->name('tasks.store');

Route::get('/get-todo', [TaskController::class, 'getTodo'])->middleware('auth')->name('getTodo');

Route::get('/viewtask/{id}', [TaskController::class, 'viewTask'])->middleware('auth');





//this will be use for S.P.A parts rendering
Route::middleware(['auth'])->group(function () {
    
    Route::group([

        'prefix' => 'admin',
        'as' => 'admin',
    ], function () {

        Route::get('/', function () {
            $task_status = TaskStatus::all();
            return view('index',compact("task_status"));
        });

    });

    Route::group([

        'prefix' => 'user',
        'as' => 'user',
    ], function () {

        Route::get('/', function () {
            $task_status = TaskStatus::all();
            return view('index',compact("task_status"));
        });

    });


});