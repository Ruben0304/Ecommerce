<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingInfoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'address' => ['nullable'],
            'country' => ['nullable'],
            'city' => ['nullable'],
            'state' => ['nullable'],
            'zipcode' => ['nullable'],
            'references' => ['nullable'],
            'latitud' => ['nullable'],
            'longitud' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
