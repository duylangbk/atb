<?php

namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param User $user
     * @return User
     */
    public function saveUser(User $user)
    {
        $user->save();
        return $user;
    }
}