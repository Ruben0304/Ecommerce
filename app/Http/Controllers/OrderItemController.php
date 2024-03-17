<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        return OrderItem::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
        ]);

        return OrderItem::create($data);
    }

    public function show(OrderItem $orderItem)
    {
        return $orderItem;
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
        ]);

        $orderItem->update($data);

        return $orderItem;
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return response()->json();
    }
}
