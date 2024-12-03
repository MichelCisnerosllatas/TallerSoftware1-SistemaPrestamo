<?php

namespace App\Livewire\Pagos;
use Livewire\Component;

class Pagos extends Component {
    public array $datosPagos = [];
    public function render()
    {
        return view('livewire.pagos.pagos');
    }
}
