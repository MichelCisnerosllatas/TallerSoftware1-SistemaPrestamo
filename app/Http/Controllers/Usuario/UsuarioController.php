<?php

namespace App\Http\Controllers\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('Usuario.index');

    }

    public function vistaregistro(){
        return view("Usuario.registro");
    }

    public function createUsuarioPrincipal(Request $request) {
        $message = "";
        try{
            $api = env('API_URL') . 'UsuarioController.php';
            $response = Http::post($api, [
                "Accion" =>  "1",
                "IdRol" => $request->input('IdRol'),
                "IdPersona" => $request->input('IdPersona'),
                "Clave" => $request->input('Clave'),
                "Token" => $request->input('Token'),
                "Login" => $request->input('Login'),
                "FechaRegistro" => $request->input('FechaRegistro')
            ]);
        }catch(\Exception $ex){

        } finally {

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
