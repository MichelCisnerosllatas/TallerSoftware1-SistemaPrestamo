<?php

namespace App\Models\Cliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Cliente extends Model {
    protected string $UrlApi;

    public function __construct() {
        $this->UrlApi = env('API_URL') ."ClienteController.php";
    }

    public function ExisteCliente($datosClientes) {
        $datos = [
            "Accion" => "5",
            'IdPersona' => isset($datosClientes['idPersona']) ? (!empty($datosClientes['idPersona']) ? $datosClientes['idPersona'] : null) : null,
            "IdUsuario" => isset($datosClientes['idUsuario']) ? (!empty($datosClientes['idUsuario']) ? $datosClientes['idUsuario'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'ExisteCliente': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "ExisteCliente"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "ExisteCliente". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function ReciclarCliente($datosClientes) {
        $datos = [
            "Accion" => "8",
            'IdCliente' => isset($datosClientes['idcliente']) ? (!empty($datosClientes['idcliente']) ? $datosClientes['idcliente'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'ExisteCliente': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "ExisteCliente"');
            }

            return $body;
        }
        catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "ExisteCliente". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function EliminarCliente($datosClientes) {
        $datos = [
            "Accion" => "4",
            'IdCliente' => isset($datosClientes['idcliente']) ? (!empty($datosClientes['idcliente']) ? $datosClientes['idcliente'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'ExisteCliente': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "ExisteCliente"');
            }

            return $body;
        }
        catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "ExisteCliente". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function RestaurarCliente($datosClientes) {
        $datos = [
            "Accion" => "7",
            'spaccion' => isset($datosClientes['spaccion']) ? (!empty($datosClientes['spaccion']) ? $datosClientes['spaccion'] : null) : null,
            'IdCliente' => isset($datosClientes['idcliente']) ? (!empty($datosClientes['idcliente']) ? $datosClientes['idcliente'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'ExisteCliente': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "ExisteCliente"');
            }

            return $body;
        }
        catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "ExisteCliente". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function BuscarCliente($datosClientes) {
        $datos = [
            "Accion" => "5",
            "IdUsuario" => isset($datosClientes['idusuario']) ? (!empty($datosClientes['idusuario']) ? $datosClientes['idusuario'] : null) : null,
            "Buscar" => isset($datosClientes['buscar']) ? (!empty($datosClientes['buscar']) ? $datosClientes['buscar'] : "") : "",
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'ExisteCliente': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "ExisteCliente"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "ExisteCliente". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function ListarClientes($datosClientes) {
        $datos = [
            "Accion" => "2",
            "IdUsuario" => isset($datosClientes['idUsuario']) ? (!empty($datosClientes['idUsuario']) ? $datosClientes['idUsuario'] : null) : null,
            'IdEmpresa' => isset($datosClientes['idEmpresa']) ? (!empty($datosClientes['idEmpresa']) ? $datosClientes['idEmpresa'] : "") : null,
            "Estado" => isset($datosClientes['estado']) ? (!empty($datosClientes['estado']) ? $datosClientes['estado'] : "") : null,
            "Fila" => isset($datosClientes['fila']) ? (!empty($datosClientes['fila']) ? $datosClientes['fila'] : '') : null,
            "Pagina" => isset($datosClientes['pagina']) ? (!empty($datosClientes['pagina']) ? $datosClientes['pagina'] : '') : null,
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

    public function InsertarCliente($datosClientes) {
        $datos = [
            "Accion" => "1",
            "IdPersona" => isset($datosClientes['idPersona']) ? (!empty($datosClientes['idPersona']) ? $datosClientes['idPersona'] : null) : null,
            "FechaRegistro" => isset($datosClientes['fechaRegistro']) ? (!empty($datosClientes['fechaRegistro']) ? $datosClientes['fechaRegistro'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'InsertarCliente': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "InsertarCliente"');
            }

            return $body;
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado Metodo Fronted "InsertarUsuarioEmpresa". Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function InsertarClienteUsuario($datosClientes) {
        $datos = [
            "Accion" => "6",
            "IdUsuarioEmpresa" => isset($datosClientes['idUsuarioEmpresa']) ? (!empty($datosClientes['idUsuarioEmpresa']) ? $datosClientes['idUsuarioEmpresa'] : null) : null,
            "IdCliente" => isset($datosClientes['idCliente']) ? (!empty($datosClientes['idCliente']) ? $datosClientes['idCliente'] : null) : null,
            "FechaRegistro" => isset($datosClientes['fechaRegistro']) ? (!empty($datosClientes['fechaRegistro']) ? $datosClientes['fechaRegistro'] : null) : null,
        ];

        try{
            $response = Http::asForm()->post($this->UrlApi,$datos);
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend 'InsertarCliente': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error en el Metodo Fronted "InsertarCliente"');
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
