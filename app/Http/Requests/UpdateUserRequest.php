<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends StoreUserRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:255' 
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->route('id')), // Certifique-se de passar o ID correto
            ]
        ];
    }
}
