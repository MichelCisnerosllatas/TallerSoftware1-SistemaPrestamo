<?php

namespace App\Livewire\Reciclaje;
use App\Models\Cliente\Cliente as ClienteModel;
use Livewire\Attributes\On;
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

    #[On('eliminarClienteRecilajeJS')]
    public function eliminarClienteRecilajeJS($datosCliente) : void {
        try{
            $modeloCliente = new ClienteModel();
            $jsonCliente = $modeloCliente->EliminarCliente([
                "idcliente" => (int)$datosCliente['idcliente']
            ]);

            if(!$jsonCliente["result"]["success"]){
                throw new \Exception($jsonCliente["result"]["message"]);
            }

            $this->listarClientesReciclados();
            $this->dispatch('TermindoeliminarClienteRecilajeJS');
        }
        catch (\Exception $ex){
            $this->dispatch('SweetAlertPrincipal', [
                'icon' => 'error', // O 'success', 'error', etc.
                'title' => 'Error',
                'text' => $ex->getMessage(),
                'showCancelButton' => false,
                'confirmButtonText' => 'Aceptar',
                'timer' => 10000,
            ]);
        }
    }

    #[On('RestaurarClienteRecilajeJS')]
    public function RestaurarClienteRecilajeJS($datosCliente) : void {
        try{
            $modeloCliente = new ClienteModel();
            $jsonCliente = $modeloCliente->RestaurarCliente([
                "spaccion" => "Activo",
                "idcliente" => (int)$datosCliente['idcliente']
            ]);

            if(!$jsonCliente["result"]["success"]){
                throw new \Exception($jsonCliente["result"]["message"]);
            }

            $this->listarClientesReciclados();
            $this->dispatch('TermindoRestaurarClienteRecilajeJS');
        }
        catch (\Exception $ex){
            $this->dispatch('SweetAlertPrincipal', [
                'icon' => 'error', // O 'success', 'error', etc.
                'title' => 'Error',
                'text' => $ex->getMessage(),
                'showCancelButton' => false,
                'confirmButtonText' => 'Aceptar',
                'timer' => 10000,
            ]);
        }
    }

    public function listarClientesReciclados(): void {
        try {
            $clienteModel = new ClienteModel();
            $response = array();
            if(session("usuariologin")["IdRol"] === "2" || session("usuariologin")["IdRol"] === "3" || session("usuariologin")["IdRol"] === "4"){
                $response = $clienteModel->ListarClientes([
                    'idUsuario' => session('usuariologin')['IdUsuario'],
                    "idEmpresa" => session('usuariologin')['IdEmpresa'],
                    'estado' => "Reciclado",
                    'fila' => $this->filaCliente,
                    'pagina' => $this->paginaCliente
                ]);
            }
            else if(session("usuariologin")["IdRol"] === "1"){
                $response = $clienteModel->ListarClientes([
                    'idUsuario' => session('usuariologin')['IdUsuario'],
                    'estado' => "Reciclado",
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
        }
    }

    public function render()
    {
        return view('livewire.reciclaje.cliente-reciclaje');
    }
}
