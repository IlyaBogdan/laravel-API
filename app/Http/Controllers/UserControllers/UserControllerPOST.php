<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;

class UserControllerPOST extends Controller {
    
    // set car to user
    public function setCarToUser(Request $req) {
        $user_id = $req->get('user_id');
        $car_id = $req->get('car_id');

        $user = User::find($user_id);
        $car = Car::find($car_id);

        // checking the user
        if ($user->car_id != NULL)
            return response()-json("ERROR! User already have a car", 200);
        
        // checking the car
        if ($car->employed)
            return response()-json("ERROR! Car already is employed", 200);

        // set car
        $user->car_id = $car_id;
        $car->employed = true;

        $user->save();
        $car->save();

        // forming a response
        $res = array(
            'user' => sprintf('%s %s', $user->name, $user->surname),
            'car' => $car->title
        );

        return response()->json(json_encode($res, JSON_UNESCAPED_SLASHES), 200);
    }

    public function releaseUser(Request $req) {
        $user_id = $req->get('user_id');
        $user = User::find($user_id);

        // checking the user
        if($user->car_id == NULL)
            return response()->json(sprintf('User %s %s already have no car', $user->name, $user->surname), 200);

        // car now is unemployed
        $car = Car::find($user->car_id);
        $car->employed = false;
        $car->save();

        // set car_id to NULL and save
        $user->car_id = NULL;
        $user->save();

        // forming a response
        $res = array(
            'user' => sprintf('%s %s', $user->name, $user->surname),
            'car_id' => $user->car_id
        );

        return response()->json(json_encode($res), 200);
    }

    // update user info
    public function updateUserInfo(Request $req, $id) {
        $user = User::find($id);

        if ($user == NULL)
            return response()->json("User does not exist", 200);
        
        $name = $req->get('name');
        $surname = $req->get('surname');

        if ($name != NULL) $user->name = $name;
        if ($surname != NULL) $user->surname = $surname;
        if ($name == NULL && $surname == NULL)
            return response()->json("ERROR: Missing parameters `name` and `surname`", 200);
        
        $user->save();

        return response()->json($user, 200);
    }
}
