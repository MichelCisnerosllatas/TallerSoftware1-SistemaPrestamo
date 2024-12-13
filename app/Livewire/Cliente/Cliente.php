<?php
    namespace App\Livewire\Cliente;
    use App\Models\Celular\Celular;
    use App\Models\Direccion\Direccion;
    use App\Models\Persona;
    use Illuminate\Support\Facades\Log;
    use Livewire\Component;
    use App\Models\Cliente\Cliente as ClienteModel;
    use Livewire\Attributes\On;
    use function Faker\Provider\DateTime;

    class Cliente extends Component {
        public array $clientes = [];
        public string $nombre;
        public string $apellido;
        public string $celular;
        public string $direccionCliente;
        public string $referenciaCliente;
        public string $correo;
        public int $tipodoc = 2;
        public string $numdoc;
        public int $idPersona;

        public int $idDistrito;
        public int $idCliente;
        public $fechaRegistro;

        public int $paginaCliente = 1;
        public int $filaCliente = 10;
        public int $totalRegistros = 1;
        public int $totalPagina= 1;
        public bool $mostrarModal = false;

        public bool $modalNuevoCliente = false;
        public bool $mostrarPregunta = false;
        public bool $mostrarError = false;


        public function mount(): void
        {
            $fecha = Date('Y-m-d H:i:s');
            $this->listarClientes();
        }

        #[On('mantenimientoClienteDesdeJS')]
        public function mantenimientoClienteDesdeJS($datosCliente): void {
//            $fecha = Date('Y-m-d H:i:s');
            $this->idPersona = $datosCliente['idpersona'] == "" ? 0 : $datosCliente['idpersona'];
            $this->idCliente = $datosCliente['idcliente'] == "" ? 0 : $datosCliente['idcliente'];
            $this->nombre = $datosCliente['nombre'];
            $this->apellido = $datosCliente['apellido'];
            $this->correo = $datosCliente['correo'];
            $this->celular = $datosCliente['celular'];
            $this->idDistrito = $datosCliente['iddistrito'];
            $this->direccionCliente = $datosCliente['direccion'];
            $this->referenciaCliente = $datosCliente['referencia'];
            $this->tipodoc = $datosCliente['tipodoc'];
            $this->numdoc = $datosCliente['numdoc'];
            $this->fechaRegistro = $datosCliente['fechaRegistro'];

            if(empty($this->idCliente) || $this->idCliente == 0){
                $this->insertarCliente();
            }else{
                $this->dispatch('mostrarSweetAlert');
            }
            //$this->fechaRegistro = Date('Y-m-d H:i:s');
        }

        public function limpiarvaraibles(): void {
            $this->nombre = '';
            $this->apellido = '';
            $this->celular = '';
            $this->direccionCliente = '';
            $this->referenciaCliente = '';
            $this->correo = '';
            $this->tipodoc = 0;
            $this->numdoc = '';
            $this->idPersona = 0;
            $this->idCliente = 0;
            $this->fechaRegistro = '';
            $this->paginaCliente = 1;
        }

        #[On('listarClienteJS')]
        public function listarClientes(): void {
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
                    $this->clientes = $response['result']['data'];
                }else{
                    $this->clientes = [];
                }
            } catch (\Exception $e) {
                session()->flash('error', 'Ocurrió un error al cargar los clientes: ' . $e->getMessage());
            }
        }

        public function insertarCliente(): void {
            $tipo = "";

            try {
                $modeloPersona = new Persona();
                $clienteModel = new ClienteModel();
                $modeloCelular = new Celular();
                $modeloDireccion = new Direccion();
                $PersonaJson = "";

                //1 VERIFICAMOS LA EXISTENCIA de DATOS DE PERSONA
                if(!empty($this->numdoc) || !empty($this->correo) || !empty($this->nombre) || !empty($this->apellido)) {
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

                if(isset($PersonaJson['result']['data'][0]['IdPersona']) || $PersonaJson["result"]["data"] != null || !empty($PersonaJson['result']['data'])){
                    //2 VERIFICAMOS SI EL CLIENTE YA EXISTE
                    $ClienteJSON = $clienteModel->ExisteCliente([
                        'idPersona' => $this->idPersona,
                        "idUsuario" => session('usuariologin')['IdUsuario'],
                    ]);

                    if($ClienteJSON["result"]["data"] != null || !empty($ClienteJSON['result']['data'])){
                        $this->dispatch('mostrarSweetAlertClienteExiste');
                        return;
                    }

                    //3 VERIFICAMOS SI EL CELULAR YA EXISTE
                    $CelularJson = $modeloCelular ->ExisteCelular([
                        "idPersona" => $this->idPersona,
                        "celular" => $this->celular
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


                //Insertar la persona
                $PersonaJson = $modeloPersona->InsertarPersona([
                    'nombre' => $this->nombre,
                    "apellido" => $this->apellido,
                    "tipoDoc" => $this->tipodoc,
                    "numDoc" => $this->numdoc,
                    'correo' => $this->correo,
                    "fechaRegistro" => $this->fechaRegistro,
                ]);
                if (!isset($PersonaJson['result']['success']) || !$PersonaJson['result']['success']) {
                    throw new \Exception($PersonaJson['result']['message'] ?? 'Error desconocido al insertar la persona');
                }
                else{
                    if (isset($PersonaJson['result']['data'][0]['IdPersona'])) {
                        $this->idPersona = $PersonaJson['result']['data'][0]['IdPersona'];
                    }
                    else {
                        throw new \Exception('No se pudo obtener el IdPersona después de insertar la persona.');
                    }
                }

                //Insertar el Celular
                $CelularJson = $modeloCelular->InsertarCelular([
                    "idPersona" => $this->idPersona,
                    "idPais" => 42,
                    "celular" => $this->celular,
                    "fechaRegistro" => $this->fechaRegistro,
                ]);
                if (!isset($CelularJson['result']['success']) || !$CelularJson['result']['success']) {
                    throw new \Exception($CelularJson['result']['message'] ?? 'Error desconocido al insertar el celular');
                }

                //Insertar la direccion
                if(!empty($this->direccionCliente)){
                    $DireccionJson = $modeloDireccion -> InsertarDireccion([
                        "idPersona" => $this->idPersona,
                        "idPais" => "42",
                        "idDepartamento" => "15",
                        "idDistrito" => $this->idDistrito,
                        "idProvincia" => "141",
                        "direccion" => $this->direccionCliente,
                        "referencia" => $this->referenciaCliente,
                        "fechaRegistro" => $this->fechaRegistro,
                    ]);
                    if (!isset($DireccionJson['result']['success']) || !$DireccionJson['result']['success']) {
                        throw new \Exception($DireccionJson['result']['message'] ?? 'Error desconocido al insertar la Direccion');
                    }
                }

                //Insertar el cliente
                $ClienteJSON = $clienteModel->InsertarCliente([
                    "idPersona" => $this->idPersona,
                    "fechaRegistro" => $this->fechaRegistro,
                ]);
                if (!isset($ClienteJSON['result']['success']) || !$ClienteJSON['result']['success']) {
                    throw new \Exception($ClienteJSON['result']['message'] ?? 'Error desconocido al insertar el Cliente');
                }
                else{
                    if (isset($ClienteJSON['result']['data'][0]['IdCliente'])) {
                        $this->idCliente = $ClienteJSON['result']['data'][0]['IdCliente'];
                    }
                    else {
                        throw new \Exception('No se pudo obtener el IdPersona después de insertar la persona.');
                    }
                }

                //Insertamos en la Tabla UsuarioCliente
                $ClienteJSON = $clienteModel->InsertarClienteUsuario([
                    "idUsuarioEmpresa" => session('usuariologin')['IdUserEmpresa'],
                    "idCliente" => $this->idCliente,
                    "fechaRegistro" => $this->fechaRegistro,
                ]);
                if (!isset($ClienteJSON['result']['success']) || !$ClienteJSON['result']['success']) {
                    throw new \Exception($ClienteJSON['result']['message'] ?? 'Error desconocido al insertar el ClienteUsuario');
                }

                $this->limpiarvaraibles();
                $this->listarClientes();
                $this->dispatch('clienteInsertadoExitosamente');
                $this->dispatch('mostrarSweetAlertClienteRegistrado');
            } catch (\Exception $e) {
                $this->dispatch('SweetAlertPrincipal', [
                    'icon' => 'error', // O 'success', 'error', etc.
                    'title' => 'Error',
                    'text' => $e->getMessage(),
                    'showCancelButton' => false,
                    'confirmButtonText' => 'Aceptar',
                ]);
                //session()->flash('error', 'Ocurrió un error al cargar los clientes: ' . $e->getMessage());
            }
        }

        #[On('reciclarClienteJS')]
        public function reciclarCliente($datosCliente) : void {
            $this->idCliente = $datosCliente['IdCliente'];
            try{
                $modeloCliente = new ClienteModel();
                $jsonCliente = $modeloCliente->ReciclarCliente([
                    "idcliente" => $this->idCliente
                ]);

                if(!$jsonCliente["result"]["success"]){
                    throw new \Exception($jsonCliente["result"]["message"]);
                }

                $this->listarClientes();
                $this->dispatch('clienteRecicladoExitosamente');
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

        #[On('buscarClienteJS')]
        public function buscarClientes($buscar): void {
            try {
                $clienteModel = new ClienteModel();
                $response = $clienteModel->BuscarCliente([
                    "idusuario" => session('usuariologin')['IdUsuario'],
                    "buscar" => $buscar
                ]);

                // Verificar si la respuesta es válida y tiene éxito
                if (!$response['result']['success']) {
                    throw new \Exception('Error en la API: ' . $response['result']['message']);
                }

                if($response['result']['data'] != null){
                    $this->clientes = $response['result']['data'];
                }else{
                    $this->clientes = [];
                }
            } catch (\Exception $e) {
                session()->flash('error', 'Ocurrió un error al cargar los clientes: ' . $e->getMessage());
            }
        }

        public function increment(): void {
            if($this->paginaCliente != $this->totalPagina){
                $this->paginaCliente++;

                $this->listarClientes();
            }
        }

        public function decrement(): void
        {
            if($this->paginaCliente > 1){
                $this->paginaCliente--;
                $this->listarClientes();
            }

        }

        #[On('selectclientefilas')]
        public function selectclientefilas($datosCliente):void {
            $this->filaCliente = $datosCliente;
            $this->listarClientes();
        }

        public function abrirModalClienteMant(): void
        {
            $this->mostrarModal = true;
        }

        public function abrirmodalNuevoCliente(): void
        {
            $this->modalNuevoCliente = true;
            $this -> limpiarvaraibles();
        }

        public function cerrarModalClienteMant(): void
        {
            $this->mostrarModal = false;

            // Emitir evento hacia el frontend
            $this->dispatch('mostrarSweetAlert');
        }

        public function cerrarmodalNuevoCliente(): void
        {
            $this->modalNuevoCliente = false;

            // Emitir evento hacia el frontend
            //$this->dispatch('mostrarSweetAlert');
        }

        public function render()
        {
            return view('livewire.cliente.cliente');
        }
    }
