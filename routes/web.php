<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CollectorController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {

    # Collectors Routing
    Route::resource('collectors', CollectorController::class);
    Route::get('/collectors/{collector}/delete', [CollectorController::class, 'delete'])
        ->name('collectors.delete');

    # Cars Routing
    Route::resource('cars', CarController::class);
    Route::get('/cars/{car}/delete', [CarController::class, 'delete'])
        ->name('cars.delete');

});
require __DIR__ . '/auth.php';
