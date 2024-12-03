<?php

namespace App\Livewire\Usuario;
use App\Models\Celular\Celular;
use App\Models\Direccion\Direccion;
use App\Models\Empresa\Empresa;
use App\Models\Persona;
use App\Models\Usuario\Usuario;
use App\Models\Usuario\UsuarioSec as UsuarioSecModel;
use Livewire\Component;

class GestionUsuario extends Component {

    public string $nombre;
    public string $apellido;
    public string $correo;
    public string $celular;
    public string $direccion;
    public string $referencia;
    public $clave;
    public string $numdoc;
    public int $tipodoc;
    public int $idPersona;
    public int $idUsuario;
    public $fechaRegistro;

    public int $count = 1;
    public bool $loading = false;
    public $confirmarClave;
    public $editIndex = null; // Índice del usuario que se está editando

    public bool $modalNuevoUsuario = false;
    public bool $mostrarModalUsuario = false;
    public array $usuarios = [];

    public string $search = ''; // Término de búsqueda



    public function mount(): void
    {
        $this->listarUsuarios();
    }

    protected array $rules = [
        'nombre'          => 'required|min:3',
        'apellido'        => 'required|min:3',
        'correo'          => 'required|email',
        'celular'         => 'required|numeric|min:9',
        'direccion'       => 'required',
        'referencia'      => 'nullable',
        'clave'           => 'required|min:6',
        'confirmarClave'  => 'required|same:clave',
        'tipodoc'         => 'required',
        'numdoc'          => 'required|numeric',
    ];


    public function CrearUsuarioSec(): void {
        $tipo = "";
        $this->validate();
        $this->loading = true;
        $this->fechaRegistro = Date("Y-m-d H:i:s");

        try {
            $modeloPersona   = new Persona();
            $modeloUsuario   = new Usuario();
            $modeloEmpresa   = new Empresa();
            $modeloDireccion = new Direccion();
            $modeloCelular   = new Celular();

            if(empty($this->numdoc) || empty($this->correo) || empty($this->nombre) || empty($this->apellido)) {
                if(!empty($this->correo)){
                    $tipo = "1";
                }

                if(!empty($this->numdoc)){
                    $tipo = "2";
                }

                if(!empty($this->nombre) || empty(!$this->apellido)){
                    $tipo = "3";
                }
            }



            // Validación de que las contraseñas coinciden
            if ($this->clave != $this->confirmarClave) {
                session()->flash('error', 'Las contraseñas no coinciden.');
                $this->dispatch('mostrarErrorContraAlert');
                $this->loading = false;
                return;
            }


            // 1. Verificar si la Persona existe (llamando al método ExistePersona del modelo Persona)
            $PersonaJson = $modeloPersona->ExistePersona(['valor' => $this->correo, 'tipo' => $tipo]);
            if (!isset($PersonaJson['result']) || empty($PersonaJson['result']['data'])) {
                $PersonaJson = $modeloPersona->InsertarPersona([
                    'nombre'        => $this->nombre,
                    "apellido"      => $this->apellido,
                    "tipoDoc"       => $this->tipodoc,
                    'numDoc'        => $this->numdoc,
                    'correo'        => $this->correo,
                    "fechaRegistro" => $this->fechaRegistro,
                ]);

                // Verificamos si la inserción fue exitosa
                if (!isset($PersonaJson['result']['success']) || !$PersonaJson['result']['success']) {
                    throw new \Exception($PersonaJson['result']['message'] ?? 'Error desconocido al insertar la persona');
                }
            }
            // Extraemos el IdPersona después de la inserción o de la búsqueda
            if (isset($PersonaJson['result']['data'][0]['IdPersona'])) {
                $this->idPersona = $PersonaJson['result']['data'][0]['IdPersona'];
            } else {
                throw new \Exception('No se pudo obtener el IdPersona después de insertar la persona.');
            }

            //Celular
            $CelularJson = $modeloCelular->ExisteCelular([
                'idPersona' => $this->idPersona,
                'celular'   => $this->celular,
            ]);

            if (isset($CelularJson['result']['data']) && !empty($CelularJson['result']['data'])) {
                // Si el celular ya existe, muestra un mensaje al usuario
                session()->flash('error', 'El número de celular ya está registrado.');
                $this->loading = false;
                return; // Detenemos la ejecución para no insertar un celular duplicado
            }

            // Si no existe, procedemos a insertarlo
            $CelularJson = $modeloCelular->InsertarCelular([
                "idPersona"     => $this->idPersona,
                "idPais"        => "42",
                "celular"       => $this->celular,
                "fechaRegistro" => $this->fechaRegistro,
            ]);

            // Verificamos si la inserción fue exitosa
            if (!isset($CelularJson['result']['success']) || !$CelularJson['result']['success']) {
                throw new \Exception($CelularJson['result']['message'] ?? 'Error desconocido al insertar el celular.');
            }

            $DireccionJson = $modeloDireccion->ExisteDireccion([
                'idPersona' => $this->idPersona,
                'celular'   => $this->celular,
            ]);

            if(isset($DireccionJson['result']) || $DireccionJson['result']['data'] == null || !$DireccionJson['result']['success']) {
                $DireccionJson = $modeloDireccion -> InsertarDireccion([
                    "idPersona" => $this->idPersona,
                    "idPais" => "42",
                    "idDepartamento" => "15",
                    "idDistrito" => "976",
                    "idProvincia" => "141",
                    "direccion" => $this->direccion,
                    "referencia" => $this->referencia,
                    "fechaRegistro" => $this->fechaRegistro,
                ]);
                if (!isset($DireccionJson['result']['success']) || !$DireccionJson['result']['success']) {
                    throw new \Exception($DireccionJson['result']['message'] ?? 'Error desconocido al insertar la Direccion');
                }
            }


            // 2. Verificar si el Usuario existe (llamando al método ExisteUsuario del modelo Usuario)
            $UsuarioJson = $modeloUsuario->ExisteUsuario([
                'idPersona' => $this->idPersona,
                'login' => $this->correo,
            ]);

            if (!isset($UsuarioJson['result']) || !isset($UsuarioJson['result']['success']) || !$UsuarioJson['result']['success']) {
                $UsuarioJson = $modeloUsuario->InsertarUsuario([
                    'idRol' => "1",
                    'idPersona' => $this->idPersona,
                    'login'     => $this->correo,
                    'clave'     => $this->clave
                ]);

                // Verificamos si la inserción fue exitosa
                if (!isset($UsuarioJson['result']['success']) || !$UsuarioJson['result']['success']) {
                    throw new \Exception($UsuarioJson['result']['message'] ?? 'Error desconocido al insertar el Usuario');
                }
            }

            // Extraemos el IdUsuario después de la inserción o de la búsqueda
            if (isset($UsuarioJson['result']['data'][0]['IdUsuario'])) {
                $this->idUsuario = $UsuarioJson['result']['data'][0]['IdUsuario'];
            } else {
                throw new \Exception('No se pudo obtener el IdUsuario después de insertar el Usuario.');
            }

            //3.INSERTAMOS EN USARIOEMPRESA
            $EmpresaJson = $modeloEmpresa->InsertarUsuarioEmpresa([
                'idEmpresa' => session('usuariologin')['IdEmpresa'],
//                'idEmpresa' => "1",
                'idUsuario' => $this->idUsuario
            ]);

            if (!$EmpresaJson['result']['success']) {
                throw new \Exception("No se pudo insertar el usuario: " . $EmpresaJson['result']['message']);
            }


//            $this->reset(); // Limpia los campos después de guardar
//            session()->flash('message', 'Usuario registrado con éxito.');

            $this->limpiarvaraibles();
            $this->cerrarModalUsuarioMant();

            // Llamar a SweetAlert
            //Alert::success('Registro Exitoso', 'El usuario ha sido registrado correctamente.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        $this->loading = false;
    }


    public function abrirmodalNuevoUsuario(): void
    {
        $this->modalNuevoUsuario = true;
        $this -> limpiarvaraibles();
    }

    public function cerrarmodalNuevoUsuario(): void
    {
        $this->modalNuevoUsuario = false;
        $this -> limpiarvaraibles();
    }

    public function limpiarvaraibles(): void
    {
        $this->nombre = '';
        $this->apellido = '';
        $this->celular = '';
        $this->direccion = '';
        $this->referencia = '';
        $this->correo = '';
        $this->tipodoc = 0;
        $this->numdoc = '';
        $this->idPersona = 0;
        $this->fechaRegistro = '';
        $this->count = 1;
        $this->clave = '';
        $this->confirmarClave = '';
    }

    public function updatedSearch(): void {
        $this->listarUsuarios();
    }

    public function listarUsuarios(): void {
        try {
            $usuarioSecModel = new UsuarioSecModel();
            $response = $usuarioSecModel->ListarUsuarioSec([
                'idEmpresa' => session('usuariologin')['IdEmpresa'],
                'estado' => 'Activo',
                'fila' => 10,
                'pagina' => 1,
                'search' => $this->search, // Agrega el término de búsqueda aquí
            ]);

            // Verificar si la respuesta es válida y tiene éxito
            if ($response['result']['success']) {
                $this->usuarios = $response['result']['data'];
            } else {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Ocurrió un error al cargar los clientes: ' . $e->getMessage());
        }
    }

    public function abrirModalUsuarioMant(): void
    {
        $this->mostrarModalUsuario = true;
    }

    public function cerrarModalUsuarioMant(): void
    {
        $this->mostrarModalUsuario = false;

        // Emitir evento hacia el frontend
        $this->cerrarmodalNuevoUsuario();
        $this->dispatch('mostrarUsuarioCreadoAlert');
    }

    public function render()
    {
        return view('livewire.usuario.gestion-usuario');
    }
}
