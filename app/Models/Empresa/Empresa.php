<?php

namespace App\Models\Empresa;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Empresa extends Model {
    protected string $UrlApi;

    public function __construct() {
        $this->UrlApi = env('API_URL') . 'EmpresaController.php';
    }

    public function InsertarUsuarioEmpresa($datosEmpresa) {
        try{
            $response = Http::timeout(10)->retry(3, 100)->asForm()->post(
                $this -> UrlApi, [
                    "Accion" => "5",
                    'IdEmpresa' => isset($datosEmpresa['idEmpresa']) ? (!empty($datosEmpresa['idEmpresa']) ? $datosEmpresa['idEmpresa'] : null) : null,
                    'IdUsuario' => isset($datosEmpresa['idUsuario']) ? (!empty($datosEmpresa['idUsuario']) ? $datosEmpresa['idUsuario'] : null) : null,
                    "FechaRegistro" => Carbon::now()->toDateTimeString()
                ]
            );

            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'InsertarUsuarioEmpresa': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "InsertarUsuarioEmpresa"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "InsertarUsuarioEmpresa". Detalles: ' . $ex->getMessage()
            ]);
        }
    }
}
