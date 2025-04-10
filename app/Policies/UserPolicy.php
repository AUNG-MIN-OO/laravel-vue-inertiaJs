<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct(User $user)
    {
        return $user->email === "admin@gmail.com";
    }
}
