<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'event_name' => 'required|string',
            'date' => 'required|date|after:today',
            'location' => 'required|string',
        ];
    }
}