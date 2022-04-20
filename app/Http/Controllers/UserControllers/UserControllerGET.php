<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserControllerGET extends Controller {
    
    // get all users
    public function all() {
        $users = User::all();
        return response()->json($users, 200);
    }

    // get all users with cars
    public function getDrivers() {
        $drivers = User::whereNotNull('car_id')->get();
        return response()->json($drivers, 200);
    }

    // get all users without cars
    public function getNonDrivers() {
        $nondrivers = User::where('car_id', NULL)->get();
        return response()->json($nondrivers, 200);
    }

    // get user by id
    public function getUserById($id) {
        $user = User::find($id);
        return response()->json($user, 200);
    }

}
