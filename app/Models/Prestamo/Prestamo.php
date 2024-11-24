<?php

namespace App\Models\Prestamo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Prestamo extends Model
{
    protected string $UrlApi;

    public function __construct() {
        $this->UrlApi = env('API_URL') ."PrestamoController.php";
    }

    public function ListarPrestamos($datosPrestmo) {
        $datos = [
            "Accion" => "7",
            "IdUsuario" => isset($datosPrestmo['idUsuario']) ? (!empty($datosPrestmo['idUsuario']) ? $datosPrestmo['idUsuario'] : null) : null
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
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
