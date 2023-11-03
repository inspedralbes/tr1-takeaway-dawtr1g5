<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json([
            "status" => 1,
            "msg" => "Registro de usuario exitoso!",
        ]);
    }
    public function login(Request $request) {
    
    $request->validate([
        "email" => "required|email",
        "password" => "required"
    ]);

    $user = User::where("email", "=", $request->email)->first();

        if (isset($user->id) ) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("auth_token")->plainTextToken;

                return response()->json([
                    "status" => 1,
                    "msg" => "Usuario logueado exitosamente!",
                    "access_token" => $token
                ]);

            } else {
                return response()->json([
                    "status" => 0,
                    "msg" => "La password es incorrecta."
                ]);
            }
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no registrado."
            ], 404);
        }
    }

    public function userProfile() {
        return response()->json([
            "status" => 0,
            "msg" => "Acerca del perfil de usuario",
            "data" => auth()->user()
        ]);
    }
    public function logout() {
        auth()->user()->tokens()->delete();

        return response()->json([
            "status" => 1,
            "msg" => "Cierre de Sesión",
        ]);
    }
}
