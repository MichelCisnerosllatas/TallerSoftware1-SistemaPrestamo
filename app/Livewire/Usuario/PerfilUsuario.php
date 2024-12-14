<?php

namespace App\Livewire\Usuario;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class PerfilUsuario extends Component
{
    public bool $isAdministrador = false; // Indica si el usuario es administrador
    public $usuario; // Almacena los datos del usuario logueado


    public function mount(): void
    {
        // Obtener el usuario logueado desde la sesión
        $this->usuario = session('usuariologin');

        // Verificar si el usuario tiene rol de administrador (IdRol 2 o 3)
        if ($this->usuario['IdRol'] === '2' || $this->usuario['IdRol'] === '3') {
            $this->isAdministrador = true;
        }
    }
    public function render()
    {
        return view('livewire.usuario.perfil-usuario',[
            'isAdministrador' => $this->isAdministrador,
            'empresa' => $this->usuario,
        ]);
    }
}
