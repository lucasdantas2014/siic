<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class SiapeUsuario implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($siape)
    {
        $this->siape = $siape;
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
        return User::where('siape',$this->siape)->get()->first() != null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Não existe usuário com esse SIAPE';
    }
}
