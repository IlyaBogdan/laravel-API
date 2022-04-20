<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserControllerDELETE extends Controller {
    

    // delete some user by id
    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();
        $res = array(
            'id' => $user->id,
            'name' => $user->name,
            'surname' => $user->surname,
            'status' => "DELETED"
        );
        return response()->json(json_encode($res, JSON_UNESCAPED_SLASHES), 201);
    }
}
