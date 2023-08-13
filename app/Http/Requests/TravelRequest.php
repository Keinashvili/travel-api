<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TravelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'is_public' => 'boolean',
            'name' => [
                'required',
                Rule::unique('travels')->ignore($this->travel),
            ],
            'description' => 'required',
            'number_of_days' => 'required|integer',
        ];
    }
}
