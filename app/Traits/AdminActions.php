<?php

namespace App\Traits;

/**
 * Allowing all actions for admin
 */
trait AdminActions
{
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
}
