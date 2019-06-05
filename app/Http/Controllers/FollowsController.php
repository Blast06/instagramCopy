<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //metodo de seguir usuario
    public function store(User $user)
    {
        //hace la conexion de el usuario que presiona seguir al perfil en el que se encuentra
        return auth()->user()->following()->toggle($user->profile);
    }
}
