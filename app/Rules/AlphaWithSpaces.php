<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaWithSpaces implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Utiliza una expresión regular para validar que el valor solo contenga letras y espacios
        return preg_match('/^[\pL\s]+$/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El campo :attribute solo puede contener letras y espacios.';
    }
}
