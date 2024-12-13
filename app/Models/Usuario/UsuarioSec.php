<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class UsuarioSec extends Model {
    protected string $UrlApi;

    public function __construct() {
        $this->UrlApi = env('API_URL') ."UsuarioSecController.php";
    }


    //Listar Usuario Secundario
    public function ListarUsuarioSec($datosUsuario) {
        $payload = [
            "Accion"    => "2",
            'IdEmpresa' => isset($datosUsuario['idEmpresa']) ? (!empty($datosUsuario['idEmpresa']) ? $datosUsuario['idEmpresa'] : "") : "",
            "Estado"    => isset($datosUsuario['estado'])    ? (!empty($datosUsuario['estado'])    ? $datosUsuario['estado'] : "") : "",
            "IdUsuarioLogeado" =>  $datosUsuario['IdUsuarioLogeado'],
            "Fila"      => isset($datosUsuario['fila'])      ? (!empty($datosUsuario['fila'])      ? $datosUsuario['fila'] : "10") : "10",
            "Pagina"    => isset($datosUsuario['pagina'])    ? (!empty($datosUsuario['pagina'])    ? $datosUsuario['pagina'] : "10") : "10",

            //Agregar id del usuario logeado para excluirlo
//            'IdUsuarioLogeado' => auth()->id(),
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$payload);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'ListarUsuarioSec': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "InsertarUsuarioSecEmpresa"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "ListarUsuarioSec". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function EliminarUsuarioSec($datosUsuario) {
        $payload = [
            "Accion"    => "4",
            'IdUsuario' => isset($datosUsuario['idUsuario']) ? (!empty($datosUsuario['idUsuario']) ? $datosUsuario['idUsuario'] : "") : "",
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$payload);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'InsertarUsuarioEmpresa': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "InsertarUsuarioSecEmpresa"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "ListarUsuarioSec". Detalles: ' . $ex->getMessage()
            ]);
        }
    }
}
