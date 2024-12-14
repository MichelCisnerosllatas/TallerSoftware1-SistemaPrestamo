<?php

namespace App\Http\Controllers\Rol;

use App\Http\Controllers\Controller;

class RolController extends Controller
{
    function index()
    {
        return view('Roles.index');
    }
}
