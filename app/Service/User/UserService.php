<?php

namespace App\Service\User;

use App\Service\User\Dto\UserDto;
use App\Service\User\Repository\UserRepository;

readonly class UserService
{
    public function __construct(private UserRepository $userRepository){}

    public function store(UserDto $userDto){
        $this->userRepository->store($userDto);
    }
    public function authenticate($email, $password): string{
        return $this->userRepository->authenticate($email, $password);
    }

}
