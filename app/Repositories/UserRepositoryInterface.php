<?php

namespace App\Repositories;

use App\User;

interface UserRepositoryInterface
{
    /**
     * @param User $user
     * @return User
     */
    public function saveUser(User $user);
}