<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Buscar todos los carritos asociados al usuario
        $carts = Cart::where('user_id', $user->id)->get();

        // Devolver la colección de carritos del usuario, que será vacía si no hay carritos
        return CartResource::collection($carts);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer'],
            // Asegúrate de validar también los datos del producto aquí
            'product_id' => ['required', 'exists:products,id'],
        ]);

        $cart = Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
        ]);

        return new CartResource($cart);
    }

    public function getTotal(Request $request)
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        $total = $carts->sum(function ($cart) {
            return $cart->quantity * $cart->product->price;
        });

        return response()->json(['total' => $total]);
    }

    public function getCount(Request $request)
    {
        $user = Auth::user();
        $count = Cart::where('user_id', $user->id)->count();

        return response()->json(['count' => $count]);
    }


    public function update(Request $request, Cart $cart)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer'],
            // Valida también los cambios en el producto si es necesario
        ]);

        $cart->update($data);

        return new CartResource($cart);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response()->json(null, 204); // Código de estado para "No Content"
    }


}
