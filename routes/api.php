<?php
    use App\Models\Cliente\Cliente;

    Route::get('/clientes', function() {
        $clienteModel = new Cliente();
        $clientes = $clienteModel->ListarClientes([
            "idUsuario" => session('usuariologin')['IdUsuario'],
            'estado' => 'Activo',
            'fila' => 10000,
            'pagina' => 1
        ]); // Aquí llamas al método que ya tienes en tu modelo
        // Asumiendo que la respuesta de ListarClientes es la estructura que has mostrado, solo retornas 'data'
        return response()->json($clientes['result']['data']);
    });
