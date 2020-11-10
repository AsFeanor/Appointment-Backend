<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('appointments', 'App\Http\Controllers\AppointmentController');


Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});


// create a user route
Route::post('/user-create', function (Request $request) {
    App\Models\User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => Hash::make(request('password')),
    ]);
});

// login a user
Route::post('/login', function () {
    $credentials = request()->only(['email','password']);
    $token = auth()->attempt($credentials);
    $user = auth()->user();
    return [$token,$user];
});

// get the authenticated user
Route::middleware('auth:api')->get('/me', function () {
   $user = auth()->user();

   return $user;
});

// post model


// logout a user
