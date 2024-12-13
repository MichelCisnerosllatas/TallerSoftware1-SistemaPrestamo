<?php

namespace App\Livewire\Inicio;
use Livewire\Component;

class Inicio extends Component {
    public float $pagodiario = 0.00;
    public float $prestamodiario = 0.00;
    public float $pagomes = 0.00;
    public float $prestamomes = 0.00;

    public function mount(): void {
        $this->listaretiquetasDashboard();
    }

    public function listaretiquetasDashboard(): void {
        try {
            $ModeloIncio = new \App\Models\Inicio\Inicio();
            if(session("usuariologin")["IdRol"] === '2' || session("usuariologin")["IdRol"] === '3' || session("usuariologin")["IdRol"] === '4') {
                $response = $ModeloIncio->DatosEtiquetaResumenCardDashboard([
                    'idempresa' => session('usuariologin')['IdEmpresa'],
                    "fechafin" => Date('Y-m-d H:i:s')
                ]);
            }else{
                $response = $ModeloIncio->DatosEtiquetaResumenCardDashboard([
                    'iduserempresa' => session('usuariologin')['IdUserEmpresa'],
                    "fechafin" => Date('Y-m-d H:i:s')
                ]);
            }


            if (!$response['result']['success']) {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }

            if ($response['result']['data'] != null) {
                $this->prestamodiario = (float)$response['result']['data']["prestamototaldiario"][0]["MontoDiario"];
                $this->prestamomes = (float)$response['result']['data']["prestamototalmes"][0]["Montomes"];
                $this->pagodiario = (float)$response['result']['data']["pagostotaldiario"][0]["PagoDiario"];
                $this->pagomes = (float)$response['result']['data']["pagostotalmes"][0]["PagoMes"];
            } else {
                $this->prestamodiario = 0.00;
                $this->prestamomes = 0.00;
                $this->pagodiario = 0.00;
                $this->pagomes = 0.00;
            }
        } catch (\Exception $e) {
            $this->dispatch('SweetAlertPrincipal', [
                'icon' => 'error', // O 'success', 'error', etc.
                'title' => 'Error en listaretiquetasDashboard',
                'text' => $e->getMessage(),
                'showCancelButton' => false,
                'confirmButtonText' => 'Aceptar',
            ]);
        }
    }

    public function render() {
        return view('livewire.inicio.inicio');
    }
}
