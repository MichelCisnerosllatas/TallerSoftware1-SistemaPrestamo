<?php

namespace App\Livewire\Empresa;
use App\Models\Empresa\Empresa;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Gestionempresa extends Component
{
    public array $datosempresa = [];//mi lista de empresa json array
    public int $fila = 10;//fila.pagina
    public int $pagina = 1;//paginas vista
    public string $activeTab = 'list'; //definido a la lista
    public string $idtipoempresa;
    public string $nombreempresa;
    public $identificacion;
    public $fecharegistro;
    public $loading = false;
    public $empresa;

    public bool $isAdministrador = false;

    public function mount(): void{

        if( session('usuariologin')['IdRol'] === '2' || session('usuariologin')['IdRol'] === '3'){
            $this->isAdministrador = true;
        }
        // Obtener la empresa asociada al usuario logueado desde la sesión
        $usuario = session('usuariologin');

        // Verificamos que el campo "Empresa" existe y contiene datos
        if (isset($usuario['Empresa']) && count($usuario['Empresa']) > 0) {
            // Asignamos el primer objeto de la lista 'Empresa' a la propiedad $empresa
            $this->empresa = (object) $usuario['Empresa'][0]; // Convertirlo en un objeto para poder acceder a sus propiedades
        } else {
            $this->empresa = null; // No se encontró la empresa asociada
            session()->flash('error', 'No se encontró la empresa asociada a este usuario.');
        }
        $this->listarempresa();
    }
    public function setTab($tab): void
    {
        $this->activeTab = $tab;
    }
    public function listarempresa() : void {

        try{
            $empresamodel = new Empresa();
            $response = $empresamodel-> ListarEmpresa([
                'tipoempresa' => 2,
                'pagina' => $this->pagina,
                'filas' => $this->fila,
            ]);
            if (!isset($response["result"]["data"]) || empty($response["result"]["data"])) {
                $this->datosempresa = [];
            } else {
                $this->datosempresa = $response['result']['data'];
            }

        }
        catch(\Exception $ex)
        {            //mostrar mensaje
            session()->flash('Error en listar empresa', $ex->getMessage());
            $this->datosempresa = [];
        }
    }
    public function InsertarEmpresa(): void {
        $this->loading = true;
        $this->fecharegistro = Date('Y-m-d H:i:s');
        //obtener usuario logueado

        $datosEmpresa = [
            'IdUserEmpresa' => session('usuariologin')["IdUserEmpresa"],
            'IdTipoEmpresa' => $this->idtipoempresa,
            'NombreEmpresa' => $this->nombreempresa,
            'Identificacion' => $this->identificacion,
            'Fecharegistro' => $this->fecharegistro,
        ];
        try{
            $modeloEmpresa = new Empresa();
            $response = $modeloEmpresa->CrearEmpresa($datosEmpresa);
            // Verificar si la respuesta fue exitosa
            if ($response['result']['success']) {
                //session()->h('message', 'Empresa creada con éxito.');
                $this->dispatch('SweetAlertPrincipal',[
                    "icon" => "success",
                    "title"=>"Registro Éxitoso",
                    "confirmButtonText" => "OK",
                ]);
                $this->dispatch('logout-and-redirect');
            } else {
                $this->dispatch('SweetAlertPrincipal', [
                    "icon" => "warning",
                    "title" => "¡Advertencia!",
                    "text" =>$response['result']['message'],
                    "confirmButtonText" => "Cerrar",
                ]);
            }
        }catch (\Exception $ex)
        {
            session()->flash('error', 'Error, la Empresa ya Existe: ' . $ex->getMessage());
        }
        $this->loading = false;
    }

    public function resetInputFields(): void
    {
        $this->idtipoempresa = '';
        $this->nombreempresa = '';
        $this->identificacion = '';
        $this->fecharegistro = '';
    }

    public function editarEmpresa($IdEmpresa): void
    {
        try {
            $modeloEmpresa = new Empresa();
            $empresa = $modeloEmpresa->ObtenerEmpresaPorId($IdEmpresa); // Asegúrate de tener un método para obtener una empresa por su ID

            if ($empresa) {
                // Puedes usar un modal o redirigir a otra página de edición
                $this->dispatch('showEditModal', ['empresa' => $empresa]);
            } else {
                session()->flash('error', 'Empresa no encontrada.');
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Error al intentar editar la empresa: ' . $ex->getMessage());
        }
    }
    public function eliminarEmpresa($IdEmpresa): void
    {
        try {
            $modeloEmpresa = new Empresa();
            $response = $modeloEmpresa->EliminarEmpresa($IdEmpresa); // Asegúrate de tener un método para eliminar una empresa

            if ($response['result']['success']) {
                $this->listarempresa(); // Recargar la lista de empresas después de eliminar
                $this->dispatch('SweetAlertPrincipal', [
                    "icon" => "success",
                    "title" => "Eliminación Exitosa",
                    "confirmButtonText" => "OK",
                ]);
            } else {
                $this->dispatch('SweetAlertPrincipal', [
                    "icon" => "warning",
                    "title" => "¡Advertencia!",
                    "text" => $response['result']['message'],
                    "confirmButtonText" => "Cerrar",
                ]);
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Error al intentar eliminar la empresa: ' . $ex->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.empresa.gestionempresa', [
            'isAdministrador' => $this->isAdministrador,
            'empresa' => $this->empresa,

        ]);
    }
}
