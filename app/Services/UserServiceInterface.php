<?php

namespace App\Services;

use App\User;

interface UserServiceInterface
{
    /**
     * @param array $parameters
     * @param User $user
     * @return User
     */
    public function updateUser(User $user, array $parameters);
}