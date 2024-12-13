<?php

namespace App\Livewire\Reciclaje;

use App\Models\Cliente\Cliente as ClienteModel;
use Livewire\Component;

class ClienteReciclaje extends Component {
    public array $clientesReciclados = [];
    public int $paginaCliente = 1;
    public int $filaCliente = 10;
    public int $totalRegistros = 1;
    public int $totalPagina= 1;

    public function mount(): void {
        $fecha = Date('Y-m-d H:i:s');
        $this->listarClientesReciclados();
    }
    public function listarClientesReciclados(): void {
        try {
            $clienteModel = new ClienteModel();
            $response = array();
            if(session("usuariologin")["IdRol"] === "2" || session("usuariologin")["IdRol"] === "3" || session("usuariologin")["IdRol"] === "4"){
                $response = $clienteModel->ListarClientes([
                    'idUsuario' => session('usuariologin')['IdUsuario'],
                    "idEmpresa" => session('usuariologin')['IdEmpresa'],
                    'fila' => $this->filaCliente,
                    'pagina' => $this->paginaCliente
                ]);
            }
            else if(session("usuariologin")["IdRol"] === "1"){
                $response = $clienteModel->ListarClientes([
                    'idUsuario' => session('usuariologin')['IdUsuario'],
                    'fila' => $this->filaCliente,
                    'pagina' => $this->paginaCliente
                ]);
            }


            // Verificar si la respuesta es válida y tiene éxito
            if (!$response['result']['success']) {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }

            if($response['result']['data'] != null){
                $this->totalPagina = $response['result']['totalPaginas'];
                $this->totalRegistros = $response['result']['totalRegistros'];
                $this->clientesReciclados = $response['result']['data'];
            }else{
                $this->clientesReciclados = [];
            }
        } catch (\Exception $e) {
            $this->dispatch('SweetAlertPrincipal', [
                'icon' => 'error', // O 'success', 'error', etc.
                'title' => 'Error en listarClientesReciclados()',
                'text' => $e->getMessage(),
                'showCancelButton' => false,
                'confirmButtonText' => 'Aceptar',
            ]);
//            session()->flash('error', 'Ocurrió un error al cargar los clientes: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.reciclaje.cliente-reciclaje');
    }
}
