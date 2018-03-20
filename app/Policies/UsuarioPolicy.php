<?php

namespace App\Policies;

use App\Nivel;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function suporteOuMaster($user)
    {
        if ($user->getNivel->getNivel() == Nivel::$MASTER || $user->getNivel->getNivel() == Nivel::$SUPORTE ) {
            return true;
        } else {
            return false;
        }
    }
    public function master($user)
    {
        if ($user->getNivel->getNivel() == Nivel::$MASTER) {
            return true;
        } else {
            return false;
        }
    }
}
