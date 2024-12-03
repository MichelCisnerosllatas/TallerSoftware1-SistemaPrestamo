<?php

namespace App\Livewire\Empresa;
use App\Models\Empresa\Empresa;
use Livewire\Component;

class Gestionempresa extends Component
{
    public array $datosempresa = [];//mi lista de empresa json array
    public int $fila = 10;//fila.pagina
    public int $pagina = 1;//paginas vista
    public string $activeTab = 'list'; //definido a la lista

    public int $idtipoempresa;
    public string $nombreempresa;
    public $identificacion;
    public $fecharegistro;
    public $loading = false;

    public function mount(): void{
        $this->listarempresa();
        //$this-> dispatch('mostrarSweetAlert');
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function listarempresa() : void
    {
        try{
            $empresamodel = new Empresa();

            $response = $empresamodel-> ListarEmpresa([
                'tipoempresa' => 2,
                'pagina' => $this->pagina,
                'filas' => $this->fila,

            ]);
            if($response["result"]["data"] == null){
                $this-> datosempresa = [];
            }else{
                $this-> datosempresa = $response['result']['data'];
            }
        }
        catch(\Exception $ex)
        {
            //mostrar mensaje
            session()->flash('Error en listar empresa', $ex->getMessage());

        }

    }

    public function InsertarEmpresa(): void
    {
        $this->loading = true;

        try{
            $modeloEmpresa = new Empresa();

            $EmpresaJson = $modeloEmpresa->ExisteEmpresa(['Identificacion' => $this->identificacion
            ]);
            if ($EmpresaJson['result']['success'] && count($EmpresaJson['result']['data']) > 0)
            {
                throw  new \Exception('La empresa ya existe');
            }
            $response = $modeloEmpresa->InsertarEmpresa([
                'IdTipoEmpresa' => $this->idtipoempresa,
                'NombreEmpresa' => $this->nombreempresa,
                'Identificacion' => $this->identificacion,
                'FechaRegistro' => $this->fecharegistro,
            ]);

            if (!isset($response['result']['success']) || !$response['result']['success']) {
                throw new \Exception($response['result']['message'] ?? 'Error al insertar la empresa.');
            }
            session()->flash('message', 'Empresa creada con éxito.');
            $this->resetInputFields(); // Limpiar campos después de la creación.
            $this->listarempresa(); // Actualizar la lista de empresas.
            $this->setTab('list'); // Cambiar a la pestaña de listado

        }catch (\Exception $ex)
        {
            session()->flash('error', 'Error al crear la empresa: ' . $ex->getMessage());
        }
        $this->loading = false;
    }
    public function resetInputFields(): void
    {
        $this->idtipoempresa = null;
        $this->nombreempresa = null;
        $this->identificacion = null;
        $this->fecharegistro = null;
    }

    public function render()
    {
        return view('livewire.empresa.gestionempresa');
    }
}
