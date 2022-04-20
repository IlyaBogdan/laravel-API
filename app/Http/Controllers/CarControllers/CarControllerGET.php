<?php

namespace App\Http\Controllers\CarControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Car;

class CarControllerGET extends Controller {

    // all cars
    public function allCars() {
        $all_cars = Car::all();
        return response()->json($all_cars, 200);
    }

    // all available cars
    public function available() { 
        $available_cars = Car::where('employed', false)->get()->toArray();
        if (empty($available_cars)) 
            return response()->json("Sorry. We have no available cars", 200);
        else
            return response()->json($available_cars, 200);
    }

    // find cars by params
    public function find(Request $req) { 

        $id = $req->get('id');
        $title = $req->get('title');
        $employed = $req->get('employed');

        $finded_cars;
        // find cars by params
        // P.S.: Maybe there exists better way for that, but i didn't find it yet

        if ($id != null && $title == null && $employed == null)
            $finded_cars = DB::select('select * from cars where id = ?', [$id]);
        else if ($id == null && $title != null && $employed == null)
            $finded_cars = DB::select('select * from cars where title = ?', [$title]);
        else if ($id == null && $title == null && $employed != null)
            $finded_cars = DB::select('select * from cars where employed = ?', [$employed]);

        else if ($id != null && $title != null && $employed == null)
            $finded_cars = DB::select('select * from cars where id = ? and title = ?', [$id, $title]);
        else if ($id != null && $title == null && $employed != null)
            $finded_cars = DB::select('select * from cars where id = ? and employed = ?', [$id, $employed]);

        else if ($id == null && $title != null && $employed != null)
            $finded_cars = DB::select('select * from cars where title = ? and employed = ?', [$title, $employed]);

        else if ($id != null && $title != null && $employed != null)
            $finded_cars = DB::select('select * from cars where id = ? and title = ? and employed = ?', [$id, $title, $employed]);

        else
            return response()->json("Incorrect params", 400);

        return response()->json($finded_cars, 200);
    }

    // car by id
    public function getById($id) { 
        return response()->json(Car::find($id), 200);
    }
}
