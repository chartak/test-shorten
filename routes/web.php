<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [ShortUrlController::class, 'index']);
Route::post('/shortLink',[ShortUrlController::class, 'store']);// ajax
Route::get('/shortenLink/{code}',[ShortUrlController::class, 'shortenLink']);