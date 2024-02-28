<?php

use App\Http\Controllers\BoxInfoController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index', [BoxInfoController::class, 'box_info'])->name('box_info');
Route::get('get_count', [BoxInfoController::class, 'box_count'])->name('get_count');
