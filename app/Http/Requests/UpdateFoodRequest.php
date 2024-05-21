<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFoodRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'manufactured_at' => ['required', 'date'],
            'purchased_at' => ['required', 'date'],
            'minimum_expiry_date' => ['required', 'date'],
            'expiry_date' => ['required', 'date'],
            'photo' => ['sometimes', 'image'],
        ];
    }
}
