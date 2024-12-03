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

    public function InsertarEmpresa($datosEmpresa) {
        $payload = [
            "Accion" => "1",
            'IdTipoEmpresa' => $datosEmpresa['IdTipoEmpresa'] ?? null,
            'NombreEmpresa' => $datosEmpresa['NombreEmpresa'] ?? null,
            'Identificacion' => $datosEmpresa['Identificacion'] ?? null,
            "FechaRegistro" => Carbon::now()->toDateTimeString(),
        ];
        try{
            $response = Http::timeout(10)->retry
            (3, 100)->asForm()->post($this-> $payload

            );
            if(!$response -> successful()){
                throw new \Exception('Error en el servidor');
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception('Error desde el backend ' .$body['result']['message']);
            }

            return $body;

        }catch (RequestException $e){
            throw new \Exception(message: "Problema de conexion con el servidor "  .$e->getMessage());
        }catch (\Exception $e){
            throw new \Exception("Error al insertar la empresa" . $e->getMessage());

        }

    }

    public function ListarEmpresa($datosEmpresa){

        try{
            $response = Http::timeout(10)->retry(3, 100)->asForm()->post(
                $this -> UrlApi, [
                    "Accion" => "2",
                    "TipoEmpresa" => $datosEmpresa['tipoempresa'],
                    'Pagina' => $datosEmpresa['pagina'],
                    'Filas' => $datosEmpresa['filas'],
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

    public  function ExisteEmpresa($datosEmpresa)
    {
        $payload = [
            "Accion" => "2",
            "Identificacion" => isset($datosEmpresa['identificacion']) ? $datosEmpresa['identificacion'] : null,
        ];
        try {
            $response = Http::timeout(10)
                ->retry(3, 100)
                ->asForm()->post($this->UrlApi, $payload);
            if (!$response->successful()) {
                throw new \Exception('Respuesta fallida del fronted "ExisteEmpresa": ');
            }

            if ($response->failed()) {
                // Si el backend responde pero con error (4xx, 5xx)
                throw new \Exception("Respuesta fallida del fronted 'ExisteEmpresa':: " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception("Respuesta fallida del fronted 'ExisteEmpresa': " .$body['result']['message']  . $response->body());
            }

            return $body;
        }catch (RequestException $e){
            throw new \Exception("Problema de conexión al realizar la petición 'ExisteEmpresa': " . $e->getMessage());
        }catch (\Exception $e){
            throw new \Exception("Ocurrió un error al ExisteEmpresa: " . $e->getMessage());
        }

    }
}
