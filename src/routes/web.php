<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;

use App\Http\Middleware\ConvertPostcodeToHalfWidth;

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

Route::get('/', [ContactController::class, 'index']);
Route::get('/api/address/{postcode}', 'AddressController@getAddressByPostcode');
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::post('/contacts', [ContactController::class, 'store'])->middleware('convert.postcode');

Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('delete');
