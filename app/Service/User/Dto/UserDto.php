<?php

namespace App\Service\User\Dto;

class UserDto
{
    public function __construct(
        public ?string $name
        ,public string $email
        ,public string $password)
    {
    }
}
