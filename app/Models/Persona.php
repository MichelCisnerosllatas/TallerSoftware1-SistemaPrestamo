<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class Persona {
    protected string $UrlApi;

    public function __construct() {
        $this->UrlApi = env('API_URL') . 'PersonaController.php';
    }

    public function InsertarPersona($datosPersona) {
        $payload = [
            "Accion" => "1",
            "Nombre" => isset($datosPersona['nombre']) ? (!empty($datosPersona['nombre']) ? $datosPersona['nombre'] : " nombre No Registrado") : "",
            "Apellido" => isset($datosPersona['apellido']) ? (!empty($datosPersona['apellido']) ? $datosPersona['apellido'] : "apellido No Registrado") : "",
            "IdTipoDoc" => isset($datosPersona['tipoDoc']) ? (!empty($datosPersona['tipoDoc']) ? $datosPersona['tipoDoc'] : null) : null,
            "NumDoc" => isset($datosPersona['numDoc']) ? (!empty($datosPersona['numDoc']) ? $datosPersona['numDoc'] : "") : "",
            "Correo" => isset($datosPersona['correo']) ? (!empty($datosPersona['correo']) ? $datosPersona['correo'] : "") : "",
            "RutaImagen" => isset($datosPersona['rutaImagen']) ? (!empty($datosPersona['rutaImagen']) ? $datosPersona['rutaImagen'] : "") : "",
            "FechaRegistro" => isset($datosPersona['fechaRegistro']) ? (!empty($datosPersona['fechaRegistro']) ? $datosPersona['fechaRegistro'] : Carbon::now()->toDateTimeString()) : Carbon::now()->toDateTimeString()
        ];

        try {
            $response = Http::timeout(10) // Establece un tiempo máximo para evitar que la petición se cuelgue
            ->retry(3, 100) // Reintenta la petición hasta 3 veces en caso de error
            ->asForm()->post($this->UrlApi, $payload);

            if (!$response->successful()) {
                throw new \Exception('Error en el servidor');
            }

            if ($response->failed()) {
                throw new \Exception("Respuesta fallida del Fronted Modelo Persona => 'InsertarPersona': " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception("Respuesta fallida del Fronted Modelo Persona => 'InsertarPersona': " .$body['result']['message']  . $response->body());
            }

            return $body;
        } catch (RequestException $e) {
            throw new \Exception("Problemas de Conexion del Fronted Modelo Persona => 'InsertarPersona': " . $e->getMessage());

        } catch (\Exception $e) {
            throw new \Exception("Ocurrió un error al insertar la persona: " . $e->getMessage());
        }
    }

    public function ExistePersona($datosPersona) {
        $payload = [
            "Accion" => "8",
            "valor" => $datosPersona['valor'] ?? '',
            "tipo" => $datosPersona['tipo'] == null ? "1" : $datosPersona['tipo'],
        ];

        try {
            $response = Http::timeout(10)
                ->retry(3, 100)
                ->asForm()->post($this->UrlApi, $payload);

            if (!$response->successful()) {
                throw new \Exception('Respuesta fallida del fronted "ExistePersona": ');
            }

            if ($response->failed()) {
                // Si el backend responde pero con error (4xx, 5xx)
                throw new \Exception("Respuesta fallida del fronted 'ExistePersona':: " . $response->body());
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                throw new \Exception("Respuesta fallida del fronted 'ExistePersona': " .$body['result']['message']  . $response->body());
            }

            return $body;
        } catch (RequestException $e) {
            throw new \Exception("Problema de conexión al realizar la petición 'ExistePersona': " . $e->getMessage());

        } catch (\Exception $e) {
            throw new \Exception("Ocurrió un error al ExistePersona: " . $e->getMessage());
        }
    }
}

