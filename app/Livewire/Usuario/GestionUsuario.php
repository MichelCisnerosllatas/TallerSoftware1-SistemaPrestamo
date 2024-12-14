<?php

namespace App\Livewire\Usuario;
use App\Models\Celular\Celular;
use App\Models\Direccion\Direccion;
use App\Models\Empresa\Empresa;
use App\Models\Persona;
use App\Models\Usuario\Usuario;
use App\Models\Cliente\Cliente as ClienteModel;
use App\Models\Usuario\UsuarioSec as UsuarioSecModel;
use Livewire\Attributes\On;
use Livewire\Component;

class GestionUsuario extends Component {

    public string $nombre;
    public string $apellido;
    public string $correoUsuarioSec;
    public string $celular;
    public string $direccionUsuarioSec;
    public string $referenciaUsuarioSec;
    public $clave;
    public string $numdoc;
    public int $tipodoc;
    public int $idPersona;
    public int $idUsuario;
    public int $idUsuarioSec;
    public $fechaRegistro;
    public int $totalRegistros = 1;
    public int $totalPagina = 1;
    public int $filaUsuarioSec = 10;
    public int $paginaUsuarioSec = 1;

    public int $count = 1;
    public bool $loading = false;
    public $confirmarClave;
    public $tipoRolUserSec;
    public $editIndex = null; // Índice del usuario que se está editando

    public bool $modalNuevoUsuario = false;
    public bool $mostrarModalUsuario = false;
    public array $usuarios = [];

    public string $search = ''; // Término de búsqueda
    public int $idUser;


    public function mount(): void {
        $this->listarUsuarios();
    }


    #[On('mantenimientoUsuarioSecRecibedesdeJS')]
    public function mantenimientoUsuarioSec($datos): void {
        $this->nombre         = $datos['nombreUserSec'];
        $this->apellido       = $datos['apellidoUserSec'];
        $this->correoUsuarioSec         = $datos['correoUserSec'];
        $this->celular        = $datos['celularUserSec'];
        $this->direccionUsuarioSec      = $datos['direccionUserSec'];
        $this->referenciaUsuarioSec     = $datos['referenciaUserSec'];
        $this->clave          = $datos['claveUserSec'];
        $this->confirmarClave = $datos['confirmarClaveUserSec'];
        $this->tipodoc        = $datos['tipoDocumentoUserSec'];
        $this->numdoc         = $datos['numdocUserSec'];
        $this->tipoRolUserSec = $datos['tipoRolUserSec'];
        $this->CrearUsuarioSec();
    }

    public function CrearUsuarioSec(): void {

        $this->fechaRegistro = Date("Y-m-d H:i:s");
        try {
            $modeloPersona   = new Persona();
            $modeloUsuario   = new Usuario();
            $modeloEmpresa   = new Empresa();
            $modeloDireccion = new Direccion();
            $modeloCelular   = new Celular();
            $PersonaJson = "";

            // Validación de que las contraseñas coinciden
            if ($this->clave != $this->confirmarClave) {
                session()->flash('error', 'Las contraseñas no coinciden.');
                $this->dispatch('mostrarErrorContraAlert');
                $this->loading = false;
                return;
            }
            //Agregué esto
            if(!empty($this->numdoc) || !empty($this->correoUsuarioSec) || !empty($this->nombre) || !empty($this->apellido) || !empty($this->apellido)) {
                $PersonaJson = $modeloPersona ->ExistePersona([
                    "valor" => $this->nombre . ' ' . $this->apellido,
                    "tipo" => "3"
                ]);

                if ($PersonaJson['result']['data'] != null) {
                    $this->idPersona = $PersonaJson['result']['data'][0]['IdPersona'];
                }else{
                    $PersonaJson = $modeloPersona ->ExistePersona([
                        "valor" => $this->numdoc,
                        "tipo" => "2"
                    ]);

                    if ($PersonaJson['result']['data'] != null){
                        $this->idPersona = $PersonaJson['result']['data'][0]['IdPersona'];
                    }
                    else{
                        $PersonaJson = $modeloPersona ->ExistePersona([
                            "valor" => $this->numdoc,
                            "tipo" => "1"
                        ]);

                        if ($PersonaJson['result']['data'] != null){
                            $this->idPersona = $PersonaJson['result']['data'][0]['IdPersona'];
                        }
                    }
                }
            }
            //hasta aqui
            if(isset($PersonaJson['result']['data'][0]['IdPersona']) || $PersonaJson["result"]["data"] != null || !empty($PersonaJson['result']['data'])){

                //3 VERIFICAMOS SI EL CELULAR YA EXISTE
                $CelularJson = $modeloCelular ->ExisteCelular([
                    "idPersona" => $this->idPersona,
                    "celular" => $this->celular,
                ]);
                if($CelularJson["result"]["data"] != null || !empty($CelularJson['result']['data'])){
                    $this->dispatch('SweetAlertPrincipal', [
                        'icon' => 'warning', // O 'success', 'error', etc.
                        'title' => 'El Celular ya Existe',
                        'text' => 'los datos del celular, coinciden con un cliente registrado, por favor verifique',
                        'showCancelButton' => false,
                        'confirmButtonText' => 'Aceptar',
                        'timer' => 10000,
                    ]);
                    return;
                }

            }

            // 1. Verificar si la Persona existe (llamando al método ExistePersona del modelo Persona)

            $PersonaJson = $modeloPersona->InsertarPersona([
                'nombre'        => $this->nombre,
                "apellido"      => $this->apellido,
                "tipoDoc"       => $this->tipodoc,
                'numDoc'        => $this->numdoc,
                'correo'        => $this->correoUsuarioSec,
                "fechaRegistro" => $this->fechaRegistro,
            ]);
            // Verificamos si la inserción fue exitosa
            if (!isset($PersonaJson['result']['success']) || !$PersonaJson['result']['success']) {
                throw new \Exception($PersonaJson['result']['message'] ?? 'Error desconocido al insertar la persona');
            }
            else{
                // Extraemos el IdPersona después de la inserción o de la búsqueda
                if (isset($PersonaJson['result']['data'][0]['IdPersona'])) {
                    $this->idPersona = $PersonaJson['result']['data'][0]['IdPersona'];
                } else {
                    throw new \Exception('No se pudo obtener el IdPersona después de insertar la persona.');
                }
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




            if(!empty($this->direccionUsuarioSec)){
                $DireccionJson = $modeloDireccion -> InsertarDireccion([
                    "idPersona" => $this->idPersona,
                    "idPais" => "42",
                    "idDepartamento" => "15",
                    "idDistrito" => "976",
                    "idProvincia" => "141",
                    "direccion" => $this->direccionUsuarioSec,
                    "referencia" => $this->referenciaUsuarioSec,
                    "fechaRegistro" => $this->fechaRegistro,
                ]);
                if (!isset($DireccionJson['result']['success']) || !$DireccionJson['result']['success']) {
                    throw new \Exception($DireccionJson['result']['message'] ?? 'Error desconocido al insertar la Direccion');
                }
            }

            //2 Verificamos si el Usuario Existe
            $UsuarioJson = $modeloUsuario->ExisteUsuario([
                'idPersona' => $this->idPersona,
                'login' => $this->correoUsuarioSec,
            ]);
            if($UsuarioJson["result"]["data"] != null || !empty($UsuarioJson['result']['data'])){
                $this->dispatch('SweetAlertPrincipal', [
                    'icon' => 'warning', // O 'success', 'error', etc.
                    'title' => 'El Usuario ya Existe',
                    'text' => 'los datos del celular, coinciden con un Usuario registrado, por favor verifique',
                    'showCancelButton' => false,
                    'confirmButtonText' => 'Aceptar',
                    'timer' => 10000,
                ]);
                return;
            }
            // 2. Verificar si el Usuario existe (llamando al método ExisteUsuario del modelo Usuario)
            $UsuarioJson = $modeloUsuario->InsertarUsuario([
                'idRol'     => $this->tipoRolUserSec,
                'idPersona' => $this->idPersona,
                'login'     => $this->correoUsuarioSec,
                'clave'     => $this->clave,
            ]);

            // Verificamos si la inserción fue exitosa
            if (!isset($UsuarioJson['result']['success']) || !$UsuarioJson['result']['success']) {
                throw new \Exception($UsuarioJson['result']['message'] ?? 'Error desconocido al insertar el Usuario');
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
                'idUsuario' => $this->idUsuario,
            ]);

            if (!$EmpresaJson['result']['success']) {
                throw new \Exception("No se pudo insertar el usuario: " . $EmpresaJson['result']['message']);
            }

            $this->dispatch('terminadomantenimientoUsuarioSecJS');
            $this->listarUsuarios();
            $this->dispatch('SweetAlertPrincipal',[
                'icon'  =>'success',
                'title'=>'Exitoso',
                'text'  =>'Usuario Creado Exitosamente',
                'confirmButtonText'=> 'Aceptar',
            ]);



            // Llamar a SweetAlert
            //Alert::success('Registro Exitoso', 'El usuario ha sido registrado correctamente.');
        } catch (\Exception $e) {
            $this->dispatch('SweetAlertPrincipal', [
                'icon' => 'error', // O 'success', 'error', etc.
                'title' => 'Error crear usuario',
                'text' => $e->getMessage(),
                'showCancelButton' => false,
                'confirmButtonText' => 'Aceptar',
                'timer' => 10000,
            ]);
//            session()->flash('error', $e->getMessage());
        }
        //        $this->loading = false;
    }

    //Para Reciclar
    #[On('reciclarUsuarioSecJS')]
    public function reciclarUsuarioSec($datosUsuario) : void {
        $this->idUsuarioSec = $datosUsuario['IdUsuario'];
        try{
            $modeloUsuarioSec = new UsuarioSecModel();
            $jsonUsuarioSec = $modeloUsuarioSec->EliminarUsuarioSec([
                "idUsuario" => $this->idUsuarioSec
            ]);

            if(!$jsonUsuarioSec["result"]["success"]){
                throw new \Exception($jsonUsuarioSec["result"]["message"]);
            }

            $this->listarUsuarios();
            $this->dispatch('usuarioSecRecicladoExitosamente');
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

    public function updatedSearch(): void {
        $this->listarUsuarios();
    }

//    protected $listeners = ['listarUsuarioSecJS' => 'listarUsuarios'];
    #[On('listarUsuarioSecJS')]
    public function listarUsuarios(): void {
        $idUsuarioLogeado = session('usuariologin')['IdUsuario'];
        try {
            $usuarioSecModel = new UsuarioSecModel();
            $response = $usuarioSecModel->ListarUsuarioSec([
                'idEmpresa' => session('usuariologin')['IdEmpresa'],
                'estado' => 'Activo',
                'IdUsuarioLogeado' => $idUsuarioLogeado,
                'fila' => $this->filaUsuarioSec,
                'pagina' => $this->paginaUsuarioSec,
//                'search' => $this->search, // Agrega el término de búsqueda aquí
            ]);


            if (!$response['result']['success']) {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }
            // Verificar si la respuesta es válida y tiene éxito
            if ($response['result']['data'] != null) {
                $this->totalPagina = $response['result']['totalPaginas'];
                $this->totalRegistros = $response['result']['totalRegistros'];
                $this->usuarios = $response['result']['data'];
            } else {
                $this->usuarios = [];
            }
        } catch (\Exception $e) {
            $this->dispatch('SweetAlertPrincipal', [
                'icon' => 'error', // O 'success', 'error', etc.
                'title' => 'Lista usuario',
                'text' => $e->getMessage(),
                'showCancelButton' => false,
                'confirmButtonText' => 'Aceptar',
            ]);
//            session()->flash('error', 'Ocurrió un error al cargar los Usuarios: ' . $e->getMessage());
        }

//        $this->dispatch('miEventoLivewire', ['mensaje' => 'Hola desde Livewire']);
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

    #[On('buscarUsuarioSecJS')]
    public function buscarUsuarioSec($buscar): void {
        try {
            $usuarioSecModel = new ClienteModel();
            $response = $usuarioSecModel->BuscarCliente([
                "idusuario" => session('usuariologin')['IdUsuario'],
                "buscar" => $buscar,
            ]);

            // Verificar si la respuesta es válida y tiene éxito
            if (!$response['result']['success']) {
                throw new \Exception('Error en la API: ' . $response['result']['message']);
            }

            if($response['result']['data'] != null){
                $this->usuarios = $response['result']['data'];
            }else{
                $this->usuarios = [];
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Ocurrió un error al cargar los clientes: ' . $e->getMessage());
        }

    }


    #[On('selectUsuarioSecfilas')]
    public function selectUsuarioSecfilas($datosUsuarioSec):void {
        $this->filaUsuarioSec = $datosUsuarioSec;
        $this->listarUsuarios();
    }

    #[On('eliminarUsuarioSecRecibedesdeJS')]
    public function eliminarUsuarioSec($datos): void{
        $usuarioSecModel = new UsuarioSecModel();
        $response = $usuarioSecModel->EliminarUsuarioSec([
            'idUsuario' => $this->idUsuario,
        ]);
    }

    public function render()
    {
        return view('livewire.usuario.gestion-usuario');
    }
}
