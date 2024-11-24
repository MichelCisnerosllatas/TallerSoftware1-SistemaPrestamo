<?php
    namespace App\Models\Direccion;
    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Http\Client\RequestException;
    use Illuminate\Support\Facades\Http;

    class Direccion extends Model {
        protected string $UrlApi;

        public function __construct() {
            $this->UrlApi = env('API_URL') . 'UbicacionController.php';
        }

        public function ExisteDireccion($datosDireccion) {
            $parametrosDireccion = [
                "Accion" => "5",
                "IdPersona" => $datosDireccion['idPersona'] ?? null,
                "Celular" => $datosDireccion['celular'] ?? ""
            ];

            try {
                $response = Http::timeout(10)
                    ->retry(3, 100)
                    ->asForm()->post($this->UrlApi, $parametrosDireccion);

                if (!$response->successful()) {
                    throw new \Exception('Error en el servidor');
                }
                if ($response->failed()) {
                    throw new \Exception("Respuesta fallida del backend: ExisteCelular:" . $response->body());
                }
                $body = $response->json();
                if ($body['result']['success']) {
                    throw new \Exception($body['result']['message']);
                }
                return $body;
            }
            catch (RequestException $e) {
                throw new \Exception("Problema de conexión al realizar la petición ExisteUsuario:: " . $e->getMessage());

            }
            catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }
        }

        public function InsertarDireccion($datosDireccion) {
            $parametrosDireccion = [
                "Accion" => "1",
                "IdPersona" => isset($datosDireccion['idPersona']) ? (!empty($datosDireccion['idPersona']) ? $datosDireccion['idPersona'] : null) : null,
                "IdPais" => isset($datosDireccion['idPais']) ? (!empty($datosDireccion['idPais']) ? $datosDireccion['idPais'] : null) : null,
                "IdDepartamento" => isset($datosDireccion['idDepartamento']) ? (!empty($datosDireccion['idDepartamento']) ? $datosDireccion['idDepartamento'] : null) : null,
                "IdDistrito" => isset($datosDireccion['idDistrito']) ? (!empty($datosDireccion['idDistrito']) ? $datosDireccion['idDistrito'] : null) : null,
                "IdProvincia" => isset($datosDireccion['idProvincia']) ? (!empty($datosDireccion['idProvincia']) ? $datosDireccion['idProvincia'] : null) : null,
                "Direccion" => isset($datosDireccion['direccion']) ? (!empty($datosDireccion['direccion']) ? $datosDireccion['direccion'] : "") : "",
                "Referencia" => isset($datosDireccion['referencia']) ? (!empty($datosDireccion['referencia']) ? $datosDireccion['referencia'] : "") : "",
                "FechaRegistro" => isset($datosDireccion['fechaRegistro']) ? (!empty($datosDireccion['fechaRegistro']) ? $datosDireccion['fechaRegistro'] : Carbon::now()->toDateTimeString()) : Carbon::now()->toDateTimeString()
            ];

            try {
                $response = Http::timeout(10) // Establece un tiempo máximo para evitar que la petición se cuelgue
                ->retry(3, 100) // Reintenta la petición hasta 3 veces en caso de error
                ->asForm()->post($this->UrlApi, $parametrosDireccion);

                if (!$response->successful()) {
                    throw new \Exception('Error en el servidor');
                }

                if ($response->failed()) {
                    throw new \Exception("Respuesta fallida del Fronted Modelo Direccion => 'InsertarDireccion': " . $response->body());
                }

                $body = $response->json();
                if (!$body['result']['success']) {
                    throw new \Exception("Respuesta fallida del Fronted Modelo Direccion => 'InsertarDireccion': " .$body['result']['message']  . $response->body());
                }

                return $body;
            } catch (RequestException $e) {
                throw new \Exception("Problemas de Conexion del Fronted Modelo Direccion => 'InsertarDireccion': " . $e->getMessage());

            } catch (\Exception $e) {
                throw new \Exception("Ocurrió un error al insertar la direccion: " . $e->getMessage());
            }
        }
    }
