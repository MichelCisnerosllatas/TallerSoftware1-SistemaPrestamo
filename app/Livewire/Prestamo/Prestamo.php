<?php

namespace App\Livewire\Prestamo;
use App\Models\Cliente\Cliente;
use App\Models\Prestamo\Prestamo as ModelsPrestamo;
use Livewire\Attributes\On;
use Livewire\Component;
use MongoDB\Driver\Session;

class Prestamo extends Component {
    public int $interes = 0;
    public int $idformaprestamo = 0;
    public int $idtipocobro = 0;
    public array $datosPrestamos = [];
    public array $datosClientesPrestamos = [];

    public function mount(): void {
        $this->listaprestamosinicio();
    }

    public function listaprestamosinicio(): void {
        try {
            $PrestamoModel = new ModelsPrestamo();
            $response = $PrestamoModel -> ListarPrestamosInicio([
                "idUsuario" => session('usuariologin')['IdUsuario'],
            ]);

            // Verificar si la respuesta es válida y tiene éxito
            if (!$response['result']['success']) {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }

            if($response['result']['data'] != null){
//                $this->totalPagina = $response['result']['totalPaginas'];
//                $this->totalRegistros = $response['result']['totalRegistros'];
                $this->datosPrestamos = $response['result']['data'];
            }else{
                $this->datosPrestamos = [];
            }
        } catch (\Exception $ex) {
            $this->dispatch("SweetAlertPrincipal", [
                "icon" => "error",
                "title" => "Error",
                "text" => "listaprestamos fallando, ".$ex->getMessage(),
                "confirmButtonText" => "Aceptar",
            ]);
        }
    }

    #[On('mantenimientoPrestamoRecibeDesdeJS')]
    public function mantenimientoprestamo($datos) : void{
        if($datos["idprestamo" == ""]){
            $this->insertarprestamo($datos);
        }

    }

    public function insertarprestamo($DatosParametros) : void {
        $PrestamoModel = new ModelsPrestamo();
        $jsonPrestamo = $PrestamoModel -> InsertarPrestamo([
            "iduserempresa" => session('usuariologin')['IdUsuario'],
            "idcliente" => $DatosParametros["idcliente"],
            "tipomoneda" => $DatosParametros["tipomoneda"],
            "tipoprestamo" => $DatosParametros["tipoprestamo"],
            "porcentajeinteres" => $DatosParametros["porcentajeinteres"],
            "montointeres" => $DatosParametros["montointeres"],
            "montoprestado" => $DatosParametros["montoprestado"],
            "montocalculado" => $DatosParametros["montocalculado"],
            "montodevolucion" => $DatosParametros["montodevolucion"],
            "fecharegistro" => $DatosParametros["fecharegistro"],
            "idtipopago" => $DatosParametros["idtipopago"],
            "cuotas" => $DatosParametros["cuotas"],
            "montocuota" => $DatosParametros["montocuota"],
            "fechavencimiento" => $DatosParametros["fechavencimiento"],
            "observacionprestamo" => $DatosParametros["observacionprestamo"],
        ]);

        $this->dispatch('mostrarSweetAlert');
    }

    public function render()
    {
        return view('livewire.prestamo.prestamo');
    }
}
