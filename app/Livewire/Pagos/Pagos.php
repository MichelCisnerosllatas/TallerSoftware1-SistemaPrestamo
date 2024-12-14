<?php

namespace App\Livewire\Pagos;
use App\Models\Pagos\Pagos as Pagosmodel;
use Livewire\Attributes\On;
use Livewire\Component;
use mysql_xdevapi\Exception;

class Pagos extends Component {
    public array $datosPagos = [];

    #[On("mantenimientopagosInicio")]
    public function mantenimientoIniciopagos($datosPagos): void {
        if($datosPagos["idpagos"] == ""){
            $this->insertarpagosInicio($datosPagos);
        }
    }

    public function insertarpagosInicio($datosPagos): void {
        try{
            $modelopago = new Pagosmodel();
            $jsonpago = $modelopago -> CrearPagos([
                "IdPrestamo" => $datosPagos["IdPrestamo"],
                "MontoPago" => $datosPagos["MontoPago"],
                "Observacion" => $datosPagos["Observacion"],
                "FechaRegistro" => $datosPagos["FechaRegistro"]
            ]);

            if($jsonpago["result"]["data"] == null){
                throw new Exception($jsonpago["result"]["message"]);
            }

            if($jsonpago["result"]["data"][0]["IdPago"] == "0"){
                throw new Exception($jsonpago["result"]["message"]);
            }

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

    public function render()
    {
        return view('livewire.pagos.pagos');
    }
}
