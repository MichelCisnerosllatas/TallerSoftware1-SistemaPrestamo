<?php

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    function index() {
        return view('Clientes.index');
    }
}
