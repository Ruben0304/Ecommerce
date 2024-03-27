<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Método para mostrar los datos del usuario autenticado
    public function index()
    {
        return Auth::user();
    }

    // Método para actualizar los datos del usuario autenticado
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validar los datos del request aquí...
        // $validatedData = $request->validate([...]);

        // Actualizar los datos del usuario aquí...
        // $user->update($validatedData);

        return response()->json(['message' => 'Usuario actualizado con éxito', 'user' => $user]);
    }

    // Método para cambiar la contraseña del usuario autenticado
    public function changePassword(Request $request)
    {
        $user = Auth::user();

        // Validar la contraseña actual y la nueva contraseña aquí...
        // $validatedData = $request->validate([...]);

        // Verificar que la contraseña actual es correcta
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Contraseña actual incorrecta'], 400);
        }

        // Cambiar la contraseña del usuario
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['message' => 'Contraseña cambiada con éxito']);
    }
}
