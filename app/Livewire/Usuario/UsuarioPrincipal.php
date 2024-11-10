<?php

namespace App\Livewire\Usuario;
use App\Models\Empresa\Empresa;
use App\Models\Persona;
use App\Models\Usuario\Usuario;
use Carbon\Carbon;
use Livewire\Component;

class UsuarioPrincipal extends Component {

    public $nombre;
    public $correo;
    public $clave;
    public $confirmarClave;
    public $idPersona;
    public $idUsuario;

    public $loading = false;

    public function render() {
        return view('livewire.usuario.usuario-principal');
    }

    public function CrearUsuarioPrincipal() {
        $this->loading = true;

        try {
            $modeloPersona = new Persona();
            $modeloUsuario = new Usuario();
            $modeloEmpresa = new Empresa();

            // Validación de que las contraseñas coinciden
            if ($this->clave !== $this->confirmarClave) {
                session()->flash('error', 'Las contraseñas no coinciden.');
                $this->loading = false;
                return;
            }

            // 1. Verificar si la Persona existe (llamando al método ExistePersona del modelo Persona)
            $PersonaJson = $modeloPersona->ExistePersona(['valor' => $this->correo, 'tipo' => '1']);
            if (!isset($PersonaJson['result']) || empty($PersonaJson['result']['data'])) {
                $PersonaJson = $modeloPersona->InsertarPersona([
                    'nombre' => $this->nombre,
                    'correo' => $this->correo
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


            // 2. Verificar si el Usuario existe (llamando al método ExisteUsuario del modelo Usuario)
            $UsuarioJson = $modeloUsuario->ExisteUsuario([
                'idPersona' => $this->idPersona,
                'login' => $this->correo,
            ]);

            if (!isset($UsuarioJson['result']) || !isset($UsuarioJson['result']['success']) || !$UsuarioJson['result']['success']) {
                $UsuarioJson = $modeloUsuario->InsertarUsuario([
                    'idRol' => "1",
                    'idPersona' => $this->idPersona,
                    'login' => $this->correo,
                    'clave' => $this->clave
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
                'idEmpresa' => '',
                'idUsuario' => $this->idUsuario
            ]);

            if (!$EmpresaJson['result']['success']) {
                throw new \Exception("No se pudo insertar el usuario: " . $EmpresaJson['result']['message']);
            }

            session()->flash('message', 'Usuario registrado con éxito.');

            // Llamar a SweetAlert
            //Alert::success('Registro Exitoso', 'El usuario ha sido registrado correctamente.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        $this->loading = false;
    }

    public function redirectToLogin() {
        return redirect('/login');
    }

}
