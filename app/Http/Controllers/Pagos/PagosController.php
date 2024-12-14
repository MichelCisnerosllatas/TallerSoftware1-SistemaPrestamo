<?php

namespace App\Http\Controllers\Pagos;

use App\Http\Controllers\Controller;

class PagosController extends Controller
{
    public function index()
    {
        return view('Pagos.index');
    }
}
