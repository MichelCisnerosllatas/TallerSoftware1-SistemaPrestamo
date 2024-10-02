<?php

namespace App\Http\Controllers\Caja;

use App\Http\Controllers\Controller;

class CajaController extends Controller
{
    function index() {
        return view('Caja.index');
    }
}
