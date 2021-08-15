<?php

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

Route::get('users', [App\Http\Controllers\PageController::class, 'users'])->name('front.users');
Route::get('department/{department:title}', [App\Http\Controllers\PageController::class, 'department'])->name('front.department');
# I put everything in one controller just for simplicity
Route::get('export', [App\Http\Controllers\PageController::class, 'export'])->name('export_users');
#Route::post('import', [App\Http\Controllers\PageController::class, 'import'])->name('import_users');
