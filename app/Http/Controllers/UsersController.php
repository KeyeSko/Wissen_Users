<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    public function index(){
        $Users = Users::all();
        return response()->json($Users);
    }
}
