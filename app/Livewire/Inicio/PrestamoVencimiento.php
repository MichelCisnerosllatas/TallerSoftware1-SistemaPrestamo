<?php

namespace App\Livewire\Inicio;
use Livewire\Component;

class PrestamoVencimiento extends Component {
    public array $tablaPrestamoVencimiento = [];
    public array $tablaPrestamoPorVencerce = [];
    public int $numerodedias = 5;

    public int $totalFilasPrestamoVencimiento = 0;
    public int $totalFilasPrestamoPorVencerce = 0;


    public function mount(): void {
        $this->ListarPrestamosVencidos();
        $this->ListarPrestamosPorVencidos();
    }

    public function ListarPrestamosVencidos(): void {
        try {
            $ModeloIncio = new \App\Models\Inicio\Inicio();
            $response = $ModeloIncio->mostrarPrestamosVencidos([
                'iduserempresa' => session('usuariologin')['IdUserEmpresa'],
                "fechafin" => Date('Y-m-d H:i:s')
            ]);

            if (!$response['result']['success']) {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }

            if ($response['result']['data'] != null) {
                $this->tablaPrestamoVencimiento = $response['result']['data'];
                $this->totalFilasPrestamoVencimiento = count($this->tablaPrestamoVencimiento);
            } else {
                $this->tablaPrestamoVencimiento = [];
                $this->totalFilasPrestamoVencimiento = 0;
            }
        } catch (\Exception $e) {
            $this->dispatch('SweetAlertPrincipal', [
                'icon' => 'error', // O 'success', 'error', etc.
                'title' => 'Error',
                'text' => $e->getMessage(),
                'showCancelButton' => false,
                'confirmButtonText' => 'Aceptar',
            ]);
        }
    }

    public function ListarPrestamosPorVencidos(): void {
        try {
            $ModeloIncio = new \App\Models\Inicio\Inicio();
            if(session('usuariologin')['IdRol'] === "2" || session('usuariologin')['IdRol'] === "3"){
                $response = $ModeloIncio->mostrarPrestamosPorVencerse([
                    'idempresa' => session('usuariologin')['IdEmpresa'],
                    "fechafin" => Date('Y-m-d H:i:s'),
                    "numerodias" => $this->numerodedias
                ]);
            }else{
                $response = $ModeloIncio->mostrarPrestamosPorVencerse([
                    'iduserempresa' => session('usuariologin')['IdUserEmpresa'],
                    "fechafin" => Date('Y-m-d H:i:s'),
                    "numerodias" => $this->numerodedias
                ]);
            }


            if (!$response['result']['success']) {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }

            if ($response['result']['data'] != null) {
                $this->tablaPrestamoPorVencerce = $response['result']['data'];
                $this->totalFilasPrestamoPorVencerce = count($this->tablaPrestamoPorVencerce);
            } else {
                $this->tablaPrestamoPorVencerce = [];
                $this->totalFilasPrestamoPorVencerce = 0;
            }
        } catch (\Exception $e) {
            $this->dispatch('SweetAlertPrincipal', [
                'icon' => 'error', // O 'success', 'error', etc.
                'title' => 'Error',
                'text' => $e->getMessage(),
                'showCancelButton' => false,
                'confirmButtonText' => 'Aceptar',
            ]);
        }
    }

    public function render() {
        return view('livewire.inicio.prestamo-vencimiento');
    }
}
