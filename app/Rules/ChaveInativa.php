<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Pedido;

class ChaveInativa implements Rule
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
        return Pedido::where('chave_id',$this->chave->id)->where('status',true)->get()->first() != null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O laboratório não está sendo usado, então não há motivos para a chave ser devolvida!';
    }
}
