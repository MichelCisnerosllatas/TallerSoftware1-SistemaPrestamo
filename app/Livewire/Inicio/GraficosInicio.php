<?php

namespace App\Livewire\Inicio;
use Livewire\Component;

class GraficosInicio extends Component {
    public array $dataSectoresPrestamos = [];
    public array $dataSectoresPagos = [];

    public function render() {
        list($NombreMes, $ValoresMonto) = $this->obtenerDatosPrestamosTodoElAnio();
        list($SeriesSectoresPrestamo, $LabelSectoresPrestamo) = $this->obtenerSectoresPrestamos();
        list($SeriesSectoresPagos, $LabelSectoresPagos) = $this->obtenerSectoresPagos();
        return view('livewire.inicio.graficos-inicio', [
            'NombreMes' => $NombreMes,
            'ValoresMonto' => $ValoresMonto,
            'SeriesSectoresPrestamo' => $SeriesSectoresPrestamo,
            'LabelSectoresPrestamo' => $LabelSectoresPrestamo,
            'SeriesSectoresPagos' => $SeriesSectoresPagos,
            'LabelSectoresPagos' => $LabelSectoresPagos,
        ]);
    }

    private function obtenerSectoresPrestamos(): array {
        $SeriesSectoresPrestamo = [];
        $LabelSectoresPrestamo = [];

        $response = "";
        $InicioModel = new \App\Models\Inicio\Inicio();
        if(session('usuariologin')['IdRol'] === "1" || session('usuariologin')['IdRol'] === "4"){
            $response = $InicioModel ->mostrarDistritoMayorPrestamos([
                'iduserempresa' => session('usuariologin')['IdUserEmpresa'],
                'fechafin' => date('Y-m-d H:i:s'),
            ]);
        }else{
            $response = $InicioModel ->mostrarDistritoMayorPrestamos([
                'iduserempresa' => session('usuariologin')['IdUserEmpresa'],
                "idempresa" => session('usuariologin')['IdEmpresa'],
                'fechafin' => date('Y-m-d H:i:s'),
            ]);
        }

        if ($response['result']['data'] != null){
            foreach ($response['result']['data'] as $item){
                $SeriesSectoresPrestamo[] = (int)$item['TotalPrestamos'];
                $LabelSectoresPrestamo[] = $item['Distrito'];
            }
        }
        return [$SeriesSectoresPrestamo, $LabelSectoresPrestamo];
    }

    private function obtenerSectoresPagos(): array {
        $SeriesSectoresPagos = [];
        $LabelSectoresPagos = [];

        $InicioModel = new \App\Models\Inicio\Inicio();
        if(session('usuariologin')['IdRol'] === "1" || session('usuariologin')['IdRol'] === "4"){
            $dataSectoresPagos = $InicioModel ->mostrarDistritoMayorPagos([
                'iduserempresa' => session('usuariologin')['IdUserEmpresa'],
                'fechafin' => date('Y-m-d H:i:s'),
            ]);
        }else{
            $dataSectoresPagos = $InicioModel ->mostrarDistritoMayorPagos([
                'iduserempresa' => session('usuariologin')['IdUserEmpresa'],
                "idempresa" => session('usuariologin')['IdEmpresa'],
                'fechafin' => date('Y-m-d H:i:s'),
            ]);
        }

        if ($dataSectoresPagos['result']['data'] != null){
            foreach ($dataSectoresPagos['result']['data'] as $item){
                $SeriesSectoresPagos[] = (int)$item['TotalPagos'];
                $LabelSectoresPagos[] = $item['Distrito'];
            }
        }
        return [$SeriesSectoresPagos, $LabelSectoresPagos];
    }

    private function obtenerDatosPrestamosTodoElAnio(): array {
        $NombreMes = []; $ValoresMonto = [];

        $InicioModel = new \App\Models\Inicio\Inicio();
        $response = $InicioModel->mostrarSUMA_PrestamosPorMESES([
            'iduserempresa' => session('usuariologin')['IdUserEmpresa'],
            'fechafin' => date('Y-m-d H:i:s'),
        ]);

        if (!$response['result']['success']) {
            throw new \Exception('Error en la API: ' . $response['result']['message']);
        }

        if ($response['result']['data'] != null) {
            foreach ($response['result']['data'] as $item) {
                $NombreMes[] = $item['NombreMes'];
                $ValoresMonto[] = $item['TotalPrestado'];
            }
        }

        return [$NombreMes, $ValoresMonto];
    }
}
