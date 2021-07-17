<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/* 

No problems at all. Theres not much documentation on this. 
I'd write a class and register it as a singleton in a service provider.
In the constructor it needs to take in the active URL probably.
You then want maybe a build method which can be called to use the subdomain, check if it exists then update
the DB connection to use the right database for that site
*/

Route::get('/', [ClientController::class, 'index']);
Route::get('/clients/{id}/orders', [ClientController::class, 'orders'])->name('client.orders');

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
