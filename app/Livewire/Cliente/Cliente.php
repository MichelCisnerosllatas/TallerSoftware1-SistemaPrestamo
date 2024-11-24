<?php
    namespace App\Livewire\Cliente;
    use App\Models\Celular\Celular;
    use App\Models\Direccion\Direccion;
    use App\Models\Persona;
    use Livewire\Component;
    use App\Models\Cliente\Cliente as ClienteModel;

    class Cliente extends Component {
        public string $nombre;
        public string $apellido;
        public string $celular;
        public string $direccion;
        public string $referencia;
        public string $correo;
        public int $tipodoc;
        public string $numdoc;
        public int $idPersona;
        public int $idCliente;
        public $fechaRegistro;

        public int $count = 1;
        public bool $mostrarModal = false;

        public bool $modalNuevoCliente = false;
        public bool $mostrarPregunta = false;
        public bool $mostrarError = false;

        public array $clientes = [];
        protected $listeners = ['setFechaRegistro'];


        public function mount(): void
        {
            $this->listarClientes();
        }

        public function setFechaRegistro($fecha): void
        {
            $this->fechaRegistro = $fecha;
        }

        public function limpiarvaraibles(): void {
            $this->nombre = '';
            $this->apellido = '';
            $this->celular = '';
            $this->direccion = '';
            $this->referencia = '';
            $this->correo = '';
            $this->tipodoc = 0;
            $this->numdoc = '';
            $this->idPersona = 0;
            $this->idCliente = 0;
            $this->fechaRegistro = '';
            $this->count = 1;
        }

        public function listarClientes(): void {
            try {
                $clienteModel = new ClienteModel();
                $response = $clienteModel->ListarClientes([
                    'idUsuario' => 1,
                    'estado' => 'Activo',
                    'fila' => 10,
                    'pagina' => 1
                ]);

                // Verificar si la respuesta es válida y tiene éxito
                if ($response['result']['success']) {
                    $this->clientes = $response['result']['data'];
                } else {
                    throw new \Exception('Error en la API: ' . $response['result']['message']);
                }
            } catch (\Exception $e) {
                session()->flash('error', 'Ocurrió un error al cargar los clientes: ' . $e->getMessage());
            }
        }

        public function insertarCliente(): void {
            $tipo = "";

            // Validar campos
            $this->validate([
                'nombre' => 'required|string|max:255',
                'correo' => 'nullable|email|max:255',
                'celular' => 'nullable|string|max:15',
            ]);

            try {
                $modeloPersona = new Persona();
                $clienteModel = new ClienteModel();
                $modeloCelular = new Celular();
                $modeloDireccion = new Direccion();

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

                //1 VERIFICAMOS LA EXISTENCIA DE LA PERSONA
                $PersonaJson = $modeloPersona ->ExistePersona([
                    "valor" => $this->nombre,
                    "tipo" => $tipo
                ]);

                if (!isset($PersonaJson['result']) || empty($PersonaJson['result']['data'])) {
                    $PersonaJson = $modeloPersona->InsertarPersona([
                        'nombre' => $this->nombre,
                        "apellido" => $this->apellido,
                        "tipoDoc" => $this->tipodoc,
                        "numDoc" => $this->numdoc,
                        'correo' => $this->correo,
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

                //2 VERIFICAMOS SI EL CELULAR EXISTE EN LA PERSONA
                $CelularJson = $modeloCelular ->ExisteCelular([
                    "idPersona" => $this->idPersona,
                    "celular" => $this->celular
                ]);
                if (!isset($CelularJson['result']) || empty($CelularJson['result']['data'])){
                    $CelularJson = $modeloCelular->InsertarCelular([
                        "idPersona" => $this->idPersona,
                        "celular" => $this->celular,
                        "fechaRegistro" => $this->fechaRegistro,
                    ]);
                    if (!isset($CelularJson['result']['success']) || !$CelularJson['result']['success']) {
                        throw new \Exception($CelularJson['result']['message'] ?? 'Error desconocido al insertar el celular');
                    }
                }

                //3 INSERTAMOS LA DIRECCION
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

                //4 VERIFICAMOS SI EL CLIENTE YA EXISTE
                $ClienteJSON = $clienteModel->ExisteCliente([
                    'idPersona' => $this->idPersona,
                    "idUsuario" => session('usuariologin')['IdUsuario'],
                ]);
                if (!isset($ClienteJSON['result']) || empty($ClienteJSON['result']['data'])){
                    $ClienteJSON = $clienteModel->InsertarCliente([
                        "idPersona" => $this->idPersona,
                        "fechaRegistro" => $this->fechaRegistro,
                    ]);
                    if (!isset($ClienteJSON['result']['success']) || !$ClienteJSON['result']['success']) {
                        throw new \Exception($ClienteJSON['result']['message'] ?? 'Error desconocido al insertar el Cliente');
                    }
                }

                if (isset($ClienteJSON['result']['data'][0]['IdCliente'])) {
                    $this->idCliente = $ClienteJSON['result']['data'][0]['IdCliente'];
                }
                else {
                    throw new \Exception('No se pudo obtener el IdPersona después de insertar la persona.');
                }

                //5 Insertamos en la Tabla UsuarioCliente
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
                $this->cerrarModalClienteMant();
            } catch (\Exception $e) {
                session()->flash('error', 'Ocurrió un error al cargar los clientes: ' . $e->getMessage());
            }
        }

        public function increment(): void
        {
            $this->count++;
        }

        public function decrement(): void
        {
            $this->count--;
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
