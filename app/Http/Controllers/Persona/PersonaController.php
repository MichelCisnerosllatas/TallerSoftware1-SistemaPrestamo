<?php

namespace App\Http\Controllers\Persona;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;

class PersonaController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request) {
        $body = null; $message = null;
        try{
            //Api para crear
            $api = env("API_URL") .'PersonaController.php';
            $response = Http::post($api, [
                "Accion" => "1",
                "Nombre" => $request->input('nombre') ?? "",
                "Apellido" => $request->input('nombre') ?? "",
                "IdTipoDoc" => $request->input('tipoDoc'),
                "NumDoc" => $request->input('numDoc') ?? "",
                "Correo" => $request->input('correo') ?? "",
                "RutaImagen" => $request->input('rutaImagen') ?? "",
                "FechaRegistro" => $request->input('fechaRegistro') ?? "",
            ]);

            if(!$response -> successful()){
                throw new Exception("Ocurrio un error en la peticion 'store' del Sistema");
            }

            $body = $response -> json();
            $message = $body['result']['message'];
        } catch (\Exception $th) {
            $message = $th -> getMessage();
        } finally {
            return response()->json([
                'success' => $body['result']['success'],
                'message' => $message,
                'idpersona' => $body['result']['IdPersona'],
            ]);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
