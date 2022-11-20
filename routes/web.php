<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TODOController;

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
    return view('welcome');
});
Route::get('/dashboard', [TODOController::class, 'dashboard']);
Route::get('add-task', [TODOController::class, 'addTask']);
Route::post('add-task', [TODOController::class, 'save']);
Route::get('list-task', [TODOController::class, 'listOfTask']);

Route::get('list-pending-task', [TODOController::class, 'listOfPendingTask']);
Route::get('list-completed-task', [TODOController::class, 'listOfCompletedTask']);

Route::delete('delete-task/{id}', [TODOController::class, 'delete']);
Route::put('update/{status}/{id}', [TODOController::class, 'update']);