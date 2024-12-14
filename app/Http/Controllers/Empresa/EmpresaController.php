<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;

class EmpresaController extends Controller
{
    public function index()
    {
        return view('Empresa.index');
    }
}
