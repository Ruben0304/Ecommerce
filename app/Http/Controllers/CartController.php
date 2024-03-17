<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return CartResource::collection(Cart::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer'],
        ]);

        return new CartResource(Cart::create($data));
    }

    public function show(Cart $cart)
    {
        return new CartResource($cart);
    }

    public function update(Request $request, Cart $cart)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer'],
        ]);

        $cart->update($data);

        return new CartResource($cart);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response()->json();
    }
}
