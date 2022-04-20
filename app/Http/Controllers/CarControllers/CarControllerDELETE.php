<?php

namespace App\Http\Controllers\CarControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;

class ControllerDELETE extends Controller {

    // delete some car
    public function deleteCar($id) {
        $car = Car::find($id);
        $car->delete();
        $res = array(
            'id' => $car->id,
            'title' => $car->title,
            'status' => "DELETED"
        );
        return response()->json(json_encode($res, JSON_UNESCAPED_SLASHES), 201);
    }

}