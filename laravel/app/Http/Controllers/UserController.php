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

        return redirect()->route('products')->with('Usuario registrado correctamente!');
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

                return redirect()->route('products');

            } else {
                return redirect()->route('login')->with('error', 'Contrasenya incorrecta.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Usuario no registrado.');
        }
    }
    public function logout() {
        auth()->user()->tokens()->delete();

        return response()->json([
            "status" => 1,
            "msg" => "Cierre de Sesión",
        ]);
    }
}
