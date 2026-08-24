<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'delivery_address' => 'required|min:10',
            'total_amount' => 'required|numeric|min:0.01',
            'restaurant_id' => 'required|exists:restaurants,id',
        ];
    }
}
