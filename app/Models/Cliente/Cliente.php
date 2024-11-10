<?php

namespace App\Models\Cliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Cliente extends Model {
    protected string $UrlApi;

    public function __construct() {
        $this->UrlApi = env('API_URL') ."ClienteController.php";
    }

    public function ListarClientes($datosClientes) {
        $datos = [
            "Accion" => "6",
        ];
        try{
            $response = Http::asForm()->post($this->UrlApi, []);
        }catch (\Exception $ex){

        }
    }
}
