<?php

namespace App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use MongoDB\Driver\Session;

class Usuario extends Model {
    protected string $UrlApi;

    public function __construct() {
        $this->UrlApi = env('API_URL') . 'UsuarioController.php';
    }

    public function InsertarUsuario($datosUsuario) {
        $payload = [
            "Accion" => "1",
            "IdRol" => isset($datosUsuario['idRol']) ? (!empty($datosUsuario['idRol']) ? $datosUsuario['idRol'] : null) : null,
            "IdPersona" => isset($datosUsuario['idPersona']) ? (!empty($datosUsuario['idPersona']) ? $datosUsuario['idPersona'] : null) : null,
            "Clave" => isset($datosUsuario['clave']) ? (!empty($datosUsuario['clave']) ? $datosUsuario['clave'] : "") : "",
            "Login" => isset($datosUsuario['login']) ? (!empty($datosUsuario['login']) ? $datosUsuario['login'] : "") : "",
            "FechaRegistro" => Carbon::now()->toDateTimeString(),
        ];

        try {
            $response = Http::timeout(10) // Establece un tiempo máximo para evitar que la petición se cuelgue
            ->retry(3, 100) // Reintenta la petición hasta 3 veces en caso de error
            ->asForm()->post($this->UrlApi, $payload);

            if (!$response->successful()) {
                throw new \Exception('Error en el servidor InsertarUsuario');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del backend InsertarUsuario: " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception("Respuesta fallida del backend InsertarUsuario: " .$body['result']['message']  . $response->body());
            }

            return $body;
        } catch (RequestException $e) {
            throw new \Exception("Problema de conexión al realizar la petición InsertarUsuario: " . $e->getMessage());

        } catch (\Exception $e) {
            throw new \Exception("Ocurrió un error al insertar el Usuario" . $e->getMessage());
        }
    }

    public function ExisteUsuario($datosUsuario) {
        $payload = [
            "Accion" => "6",
            "IdPersona" => $datosUsuario['idPersona'] ?? null,
            "Login" => $datosUsuario['login'] ?? ""
        ];

        try {
            $response = Http::timeout(10)
            ->retry(3, 100)
            ->asForm()->post($this->UrlApi, $payload);

            if (!$response->successful()) {
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                // Si el backend responde pero con error (4xx, 5xx)
                throw new \Exception("Respuesta fallida del backend: ExisteUsuario:" . $response->body());
            }

            $body = $response->json();
            if ($body['result']['success']) {
                throw new \Exception($body['result']['message']);
            }

            return $body;
        } catch (RequestException $e) {
            throw new \Exception("Problema de conexión al realizar la petición ExisteUsuario:: " . $e->getMessage());

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
