<?php

namespace App\Livewire\Pagos;

use App\Livewire\Prestamo\Prestamo;
use App\Models\Pagos\Pagos;
use App\Models\Pagos\Pagos as Pagosmodel;
use Livewire\Attributes\On;
use Livewire\Component;
use mysql_xdevapi\Exception;

class Tablapagosprestamo extends Component {

    public array $datosPagosPrestamos = [];

    #[On("mantenimientopagos")]
    public function mantenimientopagos($datosPagos): void {
        if($datosPagos["idpago"] == ""){
            $this->insertarpagos($datosPagos);
        }
    }

    public function insertarpagos($datosPagos): void {
        try{
            $modelopago = new Pagosmodel();
            $componetePrestamo = new Prestamo();
            $jsonpago = $modelopago -> CrearPagos([
                "IdPrestamo" => $datosPagos["idprestamo"],
                "MontoPago" => $datosPagos["montopago"],
                "MontoRestante" => $datosPagos["montorestante"],
                "Observacion" => $datosPagos["observacionprestamo"],
                "FechaRegistro" => $datosPagos["fecharegistro"]
            ]);

            if($jsonpago["result"]["data"] == null){
                throw new Exception($jsonpago["result"]["message"]);
            }

            if($jsonpago["result"]["data"][0]["IdPago"] == "0"){
                throw new Exception($jsonpago["result"]["message"]);
            }

            $componetePrestamo ->listaprestamosinicio();
            $this->dispatch("terminadomantenimientopagos");
        }catch (\Exception $ex){
            $this->dispatch('SweetAlertPrincipal', [
                'icon' => 'error', // O 'success', 'error', etc.
                'title' => 'Error',
                'text' => $ex->getMessage(),
                'showCancelButton' => false,
                'confirmButtonText' => 'Aceptar',
            ]);
        }
    }

    #[On('listarpagosprestamoDesdeJS')]
    public function listarpagosprestamo($data):void {
        try {
            $PrestamoModel = new Pagos();
            $response = $PrestamoModel -> ListarPagosPrestamo([
                "idPrestamo" => $data["IdPrestamo"]
            ]);

            if (!$response['result']['success']) {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }

            if($response['result']['data'] != null){
                $this->datosPagosPrestamos = $response['result']['data'];
            }else{
                $this->datosPagosPrestamos = [];
            }

            $this->dispatch('respuestalistarpagosprestamoDesdeJS', [
                "CuotaPagadas" => count($this->datosPagosPrestamos),
                "MontoPagadas" => $response['result']['MontoPagadas'],
                "MontoRestante" => $response['result']['MontoRestante'],
            ]);
        } catch (\Exception $ex) {
            $this->dispatch("SweetAlertPrincipal", [
                "icon" => "error",
                "title" => "Error",
                "text" => "listarpagosprestamo fallando, ".$ex->getMessage(),
                "confirmButtonText" => "Aceptar",
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pagos.tablapagosprestamo');
    }
}
