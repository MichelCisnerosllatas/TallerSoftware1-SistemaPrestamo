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

    public function ListarPrestamosInicio($datosPrestmo) {
        $datos = [
            "Accion" => "7",
            "IdUsuario" => isset($datosPrestmo['idUsuario']) ? (!empty($datosPrestmo['idUsuario']) ? $datosPrestmo['idUsuario'] : null) : null,
            "IdEmpresa" => isset($datosPrestmo['idempresa']) ? (!empty($datosPrestmo['idempresa']) ? $datosPrestmo['idempresa'] : null) : null,

            "Pagina" => isset($datosPrestmo['pagina']) ? (!empty($datosPrestmo['pagina']) ? $datosPrestmo['pagina'] : null) : null,
            "Fila" => isset($datosPrestmo['fila']) ? (!empty($datosPrestmo['fila']) ? $datosPrestmo['fila'] : null) : null,
            "Estado" => isset($datosPrestmo['estado']) ? (!empty($datosPrestmo['estado']) ? $datosPrestmo['estado'] : null) : null
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

    public function InsertarPrestamo($datosPrestmo) {
        $datos = [
            "Accion" => "1",
            "IdUserEmpresa" => !isset($datosPrestmo['iduserempresa']) ? null : (!empty($datosPrestmo['iduserempresa']) ? $datosPrestmo['iduserempresa'] : ""),
            "IdCliente" => !isset($datosPrestmo['idcliente']) ? null : (!empty($datosPrestmo['idcliente']) ? $datosPrestmo['idcliente'] : ""),
            "TipoMoneda" => !isset($datosPrestmo['tipomoneda']) ? null : (!empty($datosPrestmo['tipomoneda']) ? $datosPrestmo['tipomoneda'] : null),
            "TipoPrestamo" => !isset($datosPrestmo['tipoprestamo']) ? null : (!empty($datosPrestmo['tipoprestamo']) ? $datosPrestmo['tipoprestamo'] : null),
            "PorcentajeInteres" => !isset($datosPrestmo['porcentajeinteres']) ? null : (!empty($datosPrestmo['porcentajeinteres']) ? $datosPrestmo['porcentajeinteres'] : 0),
            "MontoInteres" => !isset($datosPrestmo['montointeres']) ? null : (!empty($datosPrestmo['montointeres']) ? $datosPrestmo['montointeres'] : 0.00),
            "MontoPrestado" => !isset($datosPrestmo['montoprestado']) ? null : (!empty($datosPrestmo['montoprestado']) ? $datosPrestmo['montoprestado'] : ""),
            "MontoCalculado" => !isset($datosPrestmo['montocalculado']) ? null : (!empty($datosPrestmo['montocalculado']) ? $datosPrestmo['montocalculado'] : 0.00),
            "MontoDevolucion" => !isset($datosPrestmo['montodevolucion']) ? null : (!empty($datosPrestmo['montodevolucion']) ? $datosPrestmo['montodevolucion'] : 0.00),
            "FechaRegistro" => !isset($datosPrestmo['fecharegistro']) ? null : (!empty($datosPrestmo['fecharegistro']) ? $datosPrestmo['fecharegistro'] : null),
            "IdTipoPago" => !isset($datosPrestmo['idtipopago']) ? null : (!empty($datosPrestmo['idtipopago']) ? $datosPrestmo['idtipopago'] : null),
            "FechaPago" => !isset($datosPrestmo['fechapago']) ? null : (!empty($datosPrestmo['fechapago']) ? $datosPrestmo['fechapago'] : null),
            "Cuotas" => !isset($datosPrestmo['cuotas']) ? null : (!empty($datosPrestmo['cuotas']) ? $datosPrestmo['cuotas'] : null),
            "MontoCuota" => !isset($datosPrestmo['montocuota']) ? null : (!empty($datosPrestmo['montocuota']) ? $datosPrestmo['montocuota'] : 0.00),
            "FechaVencimiento" => !isset($datosPrestmo['fechavencimiento']) ? null : (!empty($datosPrestmo['fechavencimiento']) ? $datosPrestmo['fechavencimiento'] : 0.00),
            "ObservacionPrestamo" => !isset($datosPrestmo['observacionprestamo']) ? null : (!empty($datosPrestmo['observacionprestamo']) ? $datosPrestmo['observacionprestamo'] : "")
        ];

        try {
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'InsertarPrestamo': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "InsertarPrestamo"');
            }

            return $body;
        }
        catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "InsertarPrestamo". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function ReciclarPrestamo($datosPrestmo) {
        $datos = [
            "Accion" => "5",
            "IdPrestamo" => $datosPrestmo["idprestamo"],
            "Estado" => "Reciclado"
        ];

        try {
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'InsertarPrestamo': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "InsertarPrestamo"');
            }

            return $body;
        }
        catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "InsertarPrestamo". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function BuscarPrestamo($datosPrestmo) {
        $datos = [
            "Accion" => "4",
            "IdUsuario" => $datosPrestmo["idusuario"],
            "Buscar" => $datosPrestmo["buscar"]
        ];

        try {
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'InsertarPrestamo': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "InsertarPrestamo"');
            }

            return $body;
        }
        catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "InsertarPrestamo". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function EliminarPrestamo($datosPrestmo) {
        $datos = [
            "Accion" => "5",
            "IdPrestamo" => $datosPrestmo["idprestamo"],
            "Estado" => "Eliminado"
        ];

        try {
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'InsertarPrestamo': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "InsertarPrestamo"');
            }

            return $body;
        }
        catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "InsertarPrestamo". Detalles: ' . $ex->getMessage()
            ]);
        }
    }
}
