<?php

namespace App\Models\Inicio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Inicio extends Model {
    protected string $UrlApi;

    public function __construct() {
        $this->UrlApi = env('API_URL') ."InicioController.php";
    }

    public function DatosEtiquetaResumenCardDashboard($datosInicio) {
        $datos = [
            "Accion" => "3",
            "IdUserEmpresa" => isset($datosInicio['iduserempresa']) ? (!empty($datosInicio['iduserempresa']) ? $datosInicio['iduserempresa'] : null) : null,
            "IdEmpresa" => isset($datosInicio['idempresa']) ? (!empty($datosInicio['idempresa']) ? $datosInicio['idempresa'] : null) : null,
            "FechaInicio" => isset($datosInicio['fechainicio']) ? (!empty($datosInicio['fechainicio']) ? $datosInicio['fechainicio'] : null) : null,
            "FechaFin" => isset($datosInicio['fechafin']) ? (!empty($datosInicio['fechafin']) ? $datosInicio['fechafin'] : null) : null,
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

    public function mostrarPrestamosVencidos($datosInicio) {
        $datos = [
            "Accion" => "4",
            "IdUserEmpresa" => isset($datosInicio['iduserempresa']) ? (!empty($datosInicio['iduserempresa']) ? $datosInicio['iduserempresa'] : null) : null,
            "IdEmpresa" => isset($datosInicio['idempresa']) ? (!empty($datosInicio['idempresa']) ? $datosInicio['idempresa'] : null) : null,
            "FechaFin" => isset($datosInicio['fechafin']) ? (!empty($datosInicio['fechafin']) ? $datosInicio['fechafin'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'mostrarPrestamosVencidos': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "mostrarPrestamosVencidos"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "InsertarUsuarioEmpresa". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function mostrarPrestamosPorVencerse($datosInicio) {
        $datos = [
            "Accion" => "5",
            "IdUserEmpresa" => isset($datosInicio['iduserempresa']) ? (!empty($datosInicio['iduserempresa']) ? $datosInicio['iduserempresa'] : null) : null,
            "IdEmpresa" => isset($datosInicio['idempresa']) ? (!empty($datosInicio['idempresa']) ? $datosInicio['idempresa'] : null) : null,
            "FechaFin" => isset($datosInicio['fechafin']) ? (!empty($datosInicio['fechafin']) ? $datosInicio['fechafin'] : null) : null,
            "NumeroDias" => isset($datosInicio['numerodias']) ? (!empty($datosInicio['numerodias']) ? $datosInicio['numerodias'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'mostrarPrestamosPorVencerse': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "mostrarPrestamosPorVencerse"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "mostrarPrestamosPorVencerse". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function mostrarSUMA_PrestamosPorMESES($datosInicio) {
        $datos = [
            "Accion" => "6",
            "IdUserEmpresa" => isset($datosInicio['iduserempresa']) ? (!empty($datosInicio['iduserempresa']) ? $datosInicio['iduserempresa'] : null) : null,
            "IdEmpresa" => isset($datosInicio['idempresa']) ? (!empty($datosInicio['idempresa']) ? $datosInicio['idempresa'] : null) : null,
            "FechaFin" => isset($datosInicio['fechafin']) ? (!empty($datosInicio['fechafin']) ? $datosInicio['fechafin'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'mostrarPrestamosPorVencerse': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "mostrarPrestamosPorVencerse"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "mostrarPrestamosPorVencerse". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function mostrarDistritoMayorPrestamos($datosInicio) {
        $datos = [
            "Accion" => "7",
            "IdUserEmpresa" => isset($datosInicio['iduserempresa']) ? (!empty($datosInicio['iduserempresa']) ? $datosInicio['iduserempresa'] : null) : null,
            "IdEmpresa" => isset($datosInicio['idempresa']) ? (!empty($datosInicio['idempresa']) ? $datosInicio['idempresa'] : null) : null,
            "FechaFin" => isset($datosInicio['fechafin']) ? (!empty($datosInicio['fechafin']) ? $datosInicio['fechafin'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'mostrarPrestamosPorVencerse': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "mostrarPrestamosPorVencerse"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "mostrarPrestamosPorVencerse". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function mostrarDistritoMayorPagos($datosInicio) {
        $datos = [
            "Accion" => "8",
            "IdUserEmpresa" => isset($datosInicio['iduserempresa']) ? (!empty($datosInicio['iduserempresa']) ? $datosInicio['iduserempresa'] : null) : null,
            "IdEmpresa" => isset($datosInicio['idempresa']) ? (!empty($datosInicio['idempresa']) ? $datosInicio['idempresa'] : null) : null,
            "FechaFin" => isset($datosInicio['fechafin']) ? (!empty($datosInicio['fechafin']) ? $datosInicio['fechafin'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'mostrarPrestamosPorVencerse': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "mostrarPrestamosPorVencerse"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "mostrarPrestamosPorVencerse". Detalles: ' . $ex->getMessage()
            ]);
        }
    }
}
