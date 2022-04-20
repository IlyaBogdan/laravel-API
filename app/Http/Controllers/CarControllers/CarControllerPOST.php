<?php

namespace App\Http\Controllers\CarControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;

class CarControllerPOST extends Controller {
    
    // update car info
    public function updateCarInfo(Request $req, $id) {
        $car = Car::find($id);

        if ($car == NULL)
            return response()->json("Car does not exist", 200);
        
        $title = $req->get('title');

        if ($title != NULL) $car->title = $title;
        else return response()->json("Empty params", 200);
        
        $car->save();

        return response()->json($car, 200);
    }
    
}
