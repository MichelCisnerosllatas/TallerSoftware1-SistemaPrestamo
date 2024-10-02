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

            session([
                'usuariologin' => $body['result']['data'][0]
            ]);

            // Esto es para que Laravel sepa que el usuario está autentica
            //auth()->loginUsingId(1);

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

//    public function logout() {
//        // Eliminar los datos de la sesión
//        session()->forget('usuariologin');
//        return redirect()->route('login');
//    }

    public function logout()
    {
        session()->forget('usuariologin');
        \RealRashid\SweetAlert\Facades\Alert::success('Logged Out', 'You have successfully logged out!');
        return redirect()->route('login');
    }


}
