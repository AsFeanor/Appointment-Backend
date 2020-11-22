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

Route::get('user/{user_id}/appointments', function ($user_id) {

//    return Appointment::find($user_id);
    return Appointment::where('user_id', $user_id)->get();
});

Route::resource('appointments', 'App\Http\Controllers\AppointmentController');

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});


// create a user route
Route::post('/user-create', 'App\Http\Controllers\UserController@create');

// login a user
Route::post('/login', function (Request $request) {
    $credentials = request()->only(['email','password']);

    $token = auth()->attempt($credentials);
    $user = auth()->user();
    return ['jwtToken'=>$token,'user'=>$user];
});


//Route::post('/login', 'App\Http\Controllers\UserController@index');

// get the authenticated user
Route::middleware('auth:api')->get('/me', function () {
   $user = auth()->user();

   return $user;
});

// post model


// logout a user
