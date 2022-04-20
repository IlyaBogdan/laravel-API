<?php

namespace App\Http\Controllers\CarControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;

class CarControllerPUT extends Controller {

    // add new car
    public function addNewCar(Request $req) {
        try {
            $car = Car::create($req->all());
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }        
        return response()->json($car, 201);
    }
}