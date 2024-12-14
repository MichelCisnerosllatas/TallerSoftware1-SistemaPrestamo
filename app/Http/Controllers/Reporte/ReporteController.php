<?php

namespace App\Http\Controllers\Reporte;

use App\Http\Controllers\Controller;

class ReporteController extends Controller
{
    function index()
    {
        return view('Reporte.index');
    }
}
