<?php

namespace App\Service\User\Dto;

class UserDto
{
    public function __construct(
        public ?string $name = null
        ,public string $email
        ,public string $password)
    {
    }
}
