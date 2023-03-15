<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class SiapeExiste implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($keyusuario,$pedido)
    {
        $this->keyusuario = $keyusuario;
        $this->pedido = $pedido;
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
        $user = User::where('siape',$this->keyusuario)->get()->first();
        if($user == null){
            return false;
        }else{
            return  $user->id == $this->pedido->user_id;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Este SIAPE não é o SIAPE da pessoa que pediu!';
    }
}
