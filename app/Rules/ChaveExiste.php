<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ChaveExiste implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($chave)
    {
        $this->chave = $chave;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->chave != null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Essa chave não existe!';
    }
}
