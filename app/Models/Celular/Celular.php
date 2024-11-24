<?php
    namespace App\Models\Celular;
    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Http\Client\RequestException;
    use Illuminate\Support\Facades\Http;

    class Celular extends Model {
        protected string $UrlApi;

        public function __construct() {
            $this->UrlApi = env('API_URL') . 'CelularController.php';
        }

        public function ExisteCelular($datosCelular) {
            $parametrosCelular = [
                "Accion" => "5",
                "IdPersona" => $datosCelular['idPersona'] ?? null,
                "Celular" => $datosCelular['celular'] ?? ""
            ];

            try {
                $response = Http::timeout(10)
                    ->retry(3, 100)
                    ->asForm()->post($this->UrlApi, $parametrosCelular);

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

        public function InsertarCelular($datosCelular) {
            $parametrosCelular = [
                "Accion" => "1",
                "IdPersona" => isset($datosCelular['idPersona']) ? (!empty($datosCelular['idPersona']) ? $datosCelular['idPersona'] : null) : null,
                "IdPais" => isset($datosCelular['idPais']) ? (!empty($datosCelular['idPais']) ? $datosCelular['idPais'] : null) : null,
                "Celular" => isset($datosCelular['celular']) ? (!empty($datosCelular['celular']) ? $datosCelular['celular'] : "") : "",
                "FechaRegistro" => isset($datosCelular['fechaRegistro']) ? (!empty($datosCelular['fechaRegistro']) ? $datosCelular['fechaRegistro'] : Carbon::now()->toDateTimeString()) : Carbon::now()->toDateTimeString()
            ];

            try {
                $response = Http::timeout(10) // Establece un tiempo máximo para evitar que la petición se cuelgue
                ->retry(3, 100) // Reintenta la petición hasta 3 veces en caso de error
                ->asForm()->post($this->UrlApi, $parametrosCelular);

                if (!$response->successful()) {
                    throw new \Exception('Error en el servidor');
                }

                if ($response->failed()) {
                    throw new \Exception("Respuesta fallida del Fronted Modelo Celular => 'InsertarCelular': " . $response->body());
                }

                $body = $response->json();
                if (!$body['result']['success']) {
                    throw new \Exception("Respuesta fallida del Fronted Modelo Celular => 'InsertarCelular': " .$body['result']['message']  . $response->body());
                }

                return $body;
            } catch (RequestException $e) {
                throw new \Exception("Problemas de Conexion del Fronted Modelo Celular => 'InsertarCelular': " . $e->getMessage());

            } catch (\Exception $e) {
                throw new \Exception("Ocurrió un error al insertar el Celular: " . $e->getMessage());
            }
        }
    }
