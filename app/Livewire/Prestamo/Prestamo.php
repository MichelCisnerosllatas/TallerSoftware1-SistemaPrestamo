<?php

namespace App\Livewire\Prestamo;
use App\Models\Prestamo\Prestamo as ModelsPrestamo;
use Livewire\Component;
use MongoDB\Driver\Session;

class Prestamo extends Component {
    public array $datosPrestamos = [];

    public function mount(): void {
        $this->listaprestamos();
    }

    public function listaprestamos(): void {
        try {
            $PrestamoModel = new ModelsPrestamo();
            $response = $PrestamoModel -> ListarPrestamos([
                "idUsuario" => session('usuariologin')['IdUsuario'],
            ]);

            // Verificar si la respuesta es válida y tiene éxito
            if ($response['result']['success']) {
                $this->datosPrestamos = $response['result']['data'];
            } else {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Ocurrió un error al cargar los clientes: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.prestamo.prestamo');
    }
}
