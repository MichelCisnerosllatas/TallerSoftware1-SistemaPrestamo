<?php

namespace App\Livewire\Prestamo;
use App\Models\Prestamo\Prestamo as ModelsPrestamo;
use Livewire\Attributes\On;
use Livewire\Component;

class Prestamo extends Component {
    public array $datosPrestamos = [];
    public int $totalRegistrosPrestamo = 1;
    public int $totalPaginasPrestamo = 1;
    public int $paginaprestamo = 1;
    public int $filaprestamo = 10;

    public string $estado = '';

    public function mount(): void {
        $this->listaprestamosinicio();
    }

    #[On('listarPrestamoInicioRecibeDesdeJS')]
    public function listaprestamosinicio(): void {
        try {
            $PrestamoModel = new ModelsPrestamo();
            $response = array();
            if(session("usuariologin")["IdRol"] === '2' || session("usuariologin")["IdRol"] === '3' || session("usuariologin")["IdRol"] === '4') {
                $response = $PrestamoModel -> ListarPrestamosInicio([
                    "idempresa" => session('usuariologin')['IdEmpresa'],
                    'pagina' => $this->paginaprestamo,
                    'fila' => $this->filaprestamo
                ]);
            }else{
                $response = $PrestamoModel -> ListarPrestamosInicio([
                    "idUsuario" => session('usuariologin')['IdUsuario'],
                    'pagina' => $this->paginaprestamo,
                    'fila' => $this->filaprestamo
                ]);
            }

            // Verificar si la respuesta es válida y tiene éxito
            if (!$response['result']['success']) {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }

            if($response['result']['data'] != null){
                $this->totalPaginasPrestamo = $response['result']['totalPaginas'];
                $this->totalRegistrosPrestamo = $response['result']['totalRegistros'];
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

    public function incrementPaginaPrestamo(): void {
        if($this->paginaprestamo != $this->totalPaginasPrestamo){
            $this->paginaprestamo++;

            $this->listaprestamosinicio();
        }
    }

    public function decrementPaginaPrestamo(): void {
        if($this->paginaprestamo > 1){
            $this->paginaprestamo--;
            $this->listaprestamosinicio();
        }

    }

    #[On('mantenimientoPrestamoRecibeDesdeJS')]
    public function mantenimientoprestamo($datos) : void{
        if($datos["idprestamo"] == ""){
            $this->insertarprestamo($datos);
        }
    }

    public function insertarprestamo($DatosParametros) : void {
        try{
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
                "fechapago" => $DatosParametros["fechapago"],
                "cuotas" => $DatosParametros["cuotas"],
                "montocuota" => $DatosParametros["montocuota"],
                "fechavencimiento" => $DatosParametros["fechavencimiento"],
                "observacionprestamo" => $DatosParametros["observacionprestamo"],
            ]);

            if($jsonPrestamo["result"]["data"] === null){
                $this->dispatch("SweetAlertPrincipal", [
                    "icon" => "warning",
                    "title" => "Prestamo",
                    "text" => $jsonPrestamo["result"]["message"],
                    "confirmButtonText" => "Aceptar",
                ]);

                return;
            }

            $this -> listaprestamosinicio();
            $this->dispatch('prestamoInsertadoExitosamente');
        }catch (\Exception $ex) {
            $this->dispatch("SweetAlertPrincipal", [
                "icon" => "error",
                "title" => "Error",
                "text" => "insertarprestamo fallando, ".$ex->getMessage(),
                "confirmButtonText" => "Aceptar",
            ]);
        }
    }

    #[On('reciclarprestamoRecibeDesdeJS')]
    public function reciclarprestamo($DatosParametros): void {
        try {
            $PrestamoModel = new ModelsPrestamo();
            $jsonPrestamo = $PrestamoModel->ReciclarPrestamo([
                "idprestamo" => $DatosParametros["idprestamo"],
            ]);

            if (empty($jsonPrestamo)) {
                throw new \Exception('Error en la API del Front-End:');
            }

            // Actualizar la lista de préstamos
            $this->listaprestamosinicio();
            $this->dispatch('TerminadoreciclarprestamoJS', [
                "message" => $jsonPrestamo['result']['message'],
            ]);
        } catch (\Exception $ex) {
            $this->dispatch("SweetAlertPrincipal", [
                "icon" => "error",
                "title" => "Error",
                "text" => "Reciclar préstamo fallando, " . $ex->getMessage(),
                "confirmButtonText" => "Aceptar",
            ]);
        }
    }

    #[On('buscarprestamoRecibeDesdeJS')]
    public function buscarprestamo($DatosParametros): void {
        try {
            $this->totalPaginasPrestamo = 1;
            $PrestamoModel = new ModelsPrestamo();
            if($DatosParametros["buscar"] === ''){
                $this->listaprestamosinicio();
            }else{
                $response = $PrestamoModel -> BuscarPrestamo([
                    "idusuario" => session('usuariologin')['IdUsuario'],
                    'buscar' => $DatosParametros["buscar"],
                ]);

                // Verificar si la respuesta es válida y tiene éxito
                if (!$response['result']['success']) {
                    throw new \Exception('Error en la API: ' . $response['result']['message']);
                }

                if($response['result']['data'] != null){
                    $this->totalRegistrosPrestamo = $response['result']['totalRegistros'];
                    $this->datosPrestamos = $response['result']['data'];
                }else{
                    $this->datosPrestamos = [];
                }
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
    public function render() {
        return view('livewire.prestamo.prestamo');
    }
}
