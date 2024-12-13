<?php

namespace App\Models\Pagos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;

class Pagos extends Model
{
    protected string $UrlApi;

    public function __construct() {
        $this->UrlApi = env('API_URL') ."PagoController.php";
    }

    public function ListarPagosPrestamo($parametros) {
        $datos = [
            "Accion" => "2",
            "IdPrestamo" => isset($parametros['idPrestamo']) ? (!empty($parametros['idPrestamo']) ? $parametros['idPrestamo'] : null) : null,
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

    public function CrearPagos($datosPrestamo) {
        $datos = [
            "Accion" => "1",
            "IdPrestamo" => isset($datosPrestamo['IdPrestamo']) ? (!empty($datosPrestamo['IdPrestamo']) ? $datosPrestamo['IdPrestamo'] : null) : null,
            "IdTipoPago" => isset($datosPrestamo['IdTipoPago']) ? (!empty($datosPrestamo['IdTipoPago']) ? $datosPrestamo['IdTipoPago'] : null) : null,
            "MontoPago" => isset($datosPrestamo['MontoPago']) ? (!empty($datosPrestamo['MontoPago']) ? $datosPrestamo['MontoPago'] : null) : null,
            "MontoCambio" => isset($datosPrestamo['MontoCambio']) ? (!empty($datosPrestamo['MontoCambio']) ? $datosPrestamo['MontoCambio'] : null) : null,
            "MontoRestante" => isset($datosPrestamo['MontoRestante']) ? (!empty($datosPrestamo['MontoRestante']) ? $datosPrestamo['MontoRestante'] : null) : null,
            "CuotaPago" => isset($datosPrestamo['CuotaPago']) ? (!empty($datosPrestamo['CuotaPago']) ? $datosPrestamo['CuotaPago'] : null) : null,
            "Observacion" => isset($datosPrestamo['Observacion']) ? (!empty($datosPrestamo['Observacion']) ? $datosPrestamo['Observacion'] : null) : null,
            "FechaRegistro" => isset($datosPrestamo['FechaRegistro']) ? (!empty($datosPrestamo['FechaRegistro']) ? $datosPrestamo['FechaRegistro'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'InsertarPagos': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "InsertarPagos"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "InsertarPagos". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    #[On('reciclarpagosDesdeJS')]
    public function ReciclarPagos($datospagos) {

    }
}
