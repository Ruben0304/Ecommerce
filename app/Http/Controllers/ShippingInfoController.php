<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingInfoRequest;
use App\Models\ShippingInfo;

class ShippingInfoController extends Controller
{
    public function index()
    {
        return ShippingInfo::all();
    }

    public function store(ShippingInfoRequest $request)
    {
        return ShippingInfo::create($request->validated());
    }

    public function show(ShippingInfo $shippingInfo)
    {
        return $shippingInfo;
    }

    public function update(ShippingInfoRequest $request, ShippingInfo $shippingInfo)
    {
        $shippingInfo->update($request->validated());

        return $shippingInfo;
    }

    public function destroy(ShippingInfo $shippingInfo)
    {
        $shippingInfo->delete();

        return response()->json();
    }
}
