<?php

use App\Http\Controllers\Ajustes\AjustesController;
use App\Http\Controllers\Caja\CajaController;
use App\Http\Controllers\Clientes\ClienteController;
use App\Http\Controllers\Dashboard\DasboardController;
use App\Http\Controllers\Empresa\EmpresaController;
use App\Http\Controllers\Pagos\PagosController;
use App\Http\Controllers\Permisos\PermisoController;
use App\Http\Controllers\Prestamos\PrestamosController;
use App\Http\Controllers\Reporte\ReporteController;
use App\Http\Controllers\Rol\RolController;
use App\Http\Controllers\Usuario\LoginController;
use App\Http\Controllers\Usuario\PerfilController;
use App\Http\Controllers\Usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('Principal');
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'vistalogin'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas que requieren autenticación



//Route::get('/Principal', [LoginController::class, 'vistaprincipal'])->name('principal')->middleware('auth');

Route::get('/Principal', [LoginController::class, 'vistaprincipal'])->name('principal');
Route::get("/Cliente", [ClienteController::class, 'index'])->name('cliente');
Route::get("/Caja", [CajaController::class, 'index'])->name('caja');
Route::get("/Dashboard", [DasboardController::class, 'index'])->name('dashboard');
Route::get("/Empresa", [EmpresaController::class, 'index'])->name('empresa');
Route::get("/Pagos", [PagosController::class, 'index'])->name('pagos');
Route::get("/Usuario", [UsuarioController::class, 'index'])->name('usuario');
Route::get("/Permisos", [PermisoController::class, 'index'])->name('permisos');
Route::get("/Prestamos", [PrestamosController::class, 'index'])->name('prestamos');
Route::get("/Reporte", [ReporteController::class, 'index'])->name('reporte');
Route::get("/Rol", [RolController::class, 'index'])->name('rol');
Route::get("/Reporte", [ReporteController::class, 'index'])->name('reporte');

Route::get("/Perfil", [PerfilController::class, 'index'])->name('perfil');
Route::get("/Ajustes", [AjustesController::class, 'index'])->name('ajustes');

//Peticiones POST:
Route::post('/login', [LoginController::class, 'login'])->name('login.acceder');
