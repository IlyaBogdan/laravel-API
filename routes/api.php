<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarControllers\CarControllerGET;
use App\Http\Controllers\CarControllers\CarControllerPOST;
use App\Http\Controllers\CarControllers\CarControllerPUT;
use App\Http\Controllers\CarControllers\CarControllerDELETE;

use App\Http\Controllers\UserControllers\UserControllerGET;
use App\Http\Controllers\UserControllers\UserControllerPOST;
use App\Http\Controllers\UserControllers\UserControllerPUT;
use App\Http\Controllers\UserControllers\UserControllerDELETE;


// routes for cars
Route::get('car/all', [CarControllerGET::class, 'allCars']); // return all cars
Route::get('car/available', [CarControllerGET::class, 'available']); // return all available cars
Route::get('car/find', [CarControllerGET::class, 'find']); // return a list of cars which responds to query parameters
Route::get('car/{id}', [CarControllerGET::class, 'getById']); // return one car by id

Route::put('car/add', [CarControllerPUT::class, 'addNewCar']); // add new car

Route::post('car/{id}/update-info', [CarControllerUPDATE::class, 'updateCarInfo']); // update info abput car with {id}

Route::delete('car/{id}/delete', [CarControllerDELETE::class, 'deleteCar']); // delete some car by id


// routes for users
Route::get('user/all', [UserControllerGET::class, 'all']); // return all users
Route::get('user/drivers', [UserControllerGET::class, 'getDrivers']); // return all users with cars
Route::get('user/nondrivers', [UserControllerGET::class, 'getNonDrivers']); // return all users without car
Route::get('user/{id}', [UserControllerGET::class, 'getUserById']); // return user with {id}

Route::post('user/{id}/update-info', [UserControllerPOST::class, 'updateUserInfo']); // update iser info with {id}
Route::post('user/set-car-to-user', [UserControllerPOST::class, 'setCarToUser']); // set car to user
Route::post('user/release-user', [UserControllerPOST::class, 'releaseUser']); // release user from car

Route::put('user/add', [UserControllerPUT::class, 'addNewUser']); // add new user

Route::delete('user/{id}/delete', [UserControllerDELETE::class, 'deleteUser']); // delete some user by {id}