<?php

namespace App\Http\Controllers\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller {
    public function vistalogin() {
        return view('login');
    }

    public function vistaprincipal() {
        if (!session()->has('usuariologin')) {
            return redirect()->route('login');
        }

        return view('principal');
    }

    public function login(Request $request) {
        try {
            $message = "";
            $api = env('API_URL') . 'UsuarioController.php';
            $response = Http::asForm()->post($api, [
                'Accion' => "5",
                'Login' => $request->input('login'),
                'Clave' => $request->input('clave')
            ]);

            if (!$response->successful()) {
                throw new \Exception('Error en el servidor');
            }

            $body = $response->json();
            if (!$body['result']['success']) {
                return response()->json([
                    'success' => $body['result']['success'],
                    'message' => $body['result']['message']
                ]);
            }

            if ($body['result']['data'] == null) {
                return response()->json([
                    'success' => false,
                    'message' => $body['result']['message']
                ]);
            }

            session(['usuariologin' => $body['result']['data'][0]]);
            return response()->json([
                'success' => $body['result']['success'],
                'message' => $body['result']['message']
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado. Detalles: ' . $ex->getMessage()
            ]);
        }
    }

    public function logout()
    {
        session()->forget('usuariologin');
        \RealRashid\SweetAlert\Facades\Alert::success('Logged Out', 'You have successfully logged out!');
        return redirect()->route('login');
    }
}
