<?php

namespace App\Policies;

use App\Chamado;
use App\Nivel;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChamadoPolicy
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

    public function visualizarChamados($user)
    {
        if ($user->getNivel->getNivel() == Nivel::$MASTER || $user->getNivel->getNivel() == Nivel::$SUPORTE) {
            return true;
        } else {
            return false;
        }
    }

    public function pegarChamado($user, Chamado $chamado)
    {
        if (($user->getNivel->getNivel() == Nivel::$MASTER || $user->getNivel->getNivel() == Nivel::$SUPORTE)
            && $chamado->getUsuario->getId() != $user->getId()
            && $chamado->getStatus->getId() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function rejeitarChamado($user, Chamado $chamado)
    {
        if (($user->getNivel->getNivel() == Nivel::$MASTER || $user->getNivel->getNivel() == Nivel::$SUPORTE)
            && $chamado->getUsuario->getId() != $user->getId()
            && $chamado->getStatus->getId() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function excluirChamado($user, Chamado $chamado)
    {
        if ($chamado->getStatus->getId() == 1 && $chamado->getUsuario->getId() == $user->getId()) {
            return true;
        } else {
            return false;
        }
    }

    public function finalizarChamado($user, Chamado $chamado)
    {
        if ($chamado->getAtendente == null) {
            return false;
        } elseif (($user->getId() == $chamado->getUsuario->getId() || $user->getNivel->getNivel() == Nivel::$MASTER || $user->getNivel->getNivel() == Nivel::$SUPORTE)
            && ($chamado->getStatus->getId() == 2 || $chamado->getStatus->getId() == 2)) {
            return true;
        } else {
            return false;
        }
    }
}
