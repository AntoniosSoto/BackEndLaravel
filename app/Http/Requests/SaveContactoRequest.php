<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaWithSpaces;

class SaveContactoRequest extends FormRequest
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
            'nombre'         => ['required','max:20',new AlphaWithSpaces],
            'apellido_paterno'       => ['required','max:20',new AlphaWithSpaces],
            'apellido_materno'  => ['required','max:20',new AlphaWithSpaces],
        ];
    }
}
