<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;

class LoginController extends Controller {
    public function vistalogin() {
        return view('login');
    }
}
