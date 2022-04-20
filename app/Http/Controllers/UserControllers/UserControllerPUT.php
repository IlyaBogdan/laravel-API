<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserControllerPUT extends Controller {
    
    // add new user
    public function addNewUser(Request $req) {
        try {
            $user = User::create($req->all());
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }        
        return response()->json($user, 201);
    }
}
