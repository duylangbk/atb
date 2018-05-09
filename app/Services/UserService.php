<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\User;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function updateUser(User $user, array $parameters)
    {
        $user->setName($parameters['name']);
        $user->setAddress($parameters['address']);
        $user->setTel($parameters['tel']);
        return $this->userRepository->saveUser($user);
    }
}