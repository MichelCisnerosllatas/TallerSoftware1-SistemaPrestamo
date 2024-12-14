<?php

namespace App\Livewire\Cliente;
use App\Models\Cliente\Cliente;
use Livewire\Component;

class SeleccionarCliente extends Component {
    public array $datosClientesPrestamos = [];
    public int $totalClientes = 0;

    public function mount(): void {
        $this->listartodoslosclientesprestamos();
    }

    public function listartodoslosclientesprestamos(): void {
        try {
            $ClienteModel = new Cliente();
//            $response = $ClienteModel->ListarClientes([
//                'idUsuario' => session('usuariologin')['IdUsuario'],
////                "idEmpresa" => session('usuariologin')['IdEmpresa'],
//            ]);
            $response = array();
            if(session("usuariologin")["IdRol"] === "2" || session("usuariologin")["IdRol"] === "3" || session("usuariologin")["IdRol"] === "4"){
                $response = $ClienteModel->ListarClientes([
                    'idUsuario' => session('usuariologin')['IdUsuario'],
                    "idEmpresa" => session('usuariologin')['IdEmpresa'],
                ]);
            }
            else{
                $response = $ClienteModel->ListarClientes([
                    'idUsuario' => session('usuariologin')['IdUsuario'],
//                    "idEmpresa" => session('usuariologin')['IdEmpresa'],
                ]);
            }



            // Verificar si la respuesta es válida y tiene éxito
            if (!$response['result']['success']) {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }

            if($response['result']['data'] != null){
                $this->datosClientesPrestamos = $response['result']['data'];
            }else{
                $this->datosClientesPrestamos = [];
            }
            $this->totalClientes = count($this->datosClientesPrestamos);
        } catch (\Exception $ex) {
            $this->dispatch("SweetAlertPrincipal", [
                "icon" => "error",
                "title" => "Error",
                "text" => "listaprestamos fallando, ".$ex->getMessage(),
                "confirmButtonText" => "Aceptar",
            ]);
        }
    }

    public function render() {
        return view('livewire.cliente.seleccionar-cliente');
    }
}
