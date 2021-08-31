<?php

namespace App\Transformers\User;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'user_id' => $user->id,
            'name' => strtoupper($user->name()),
            'email' => $user->email,
            'status' => ($user->active) ? 'ACTIVO' : 'INACTIVO',
            'active' => $user->active,
            'rol' => ['name'=>$user->getRole()]
        ];
    }
}
