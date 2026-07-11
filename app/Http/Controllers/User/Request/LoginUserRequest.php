<?php

namespace App\Http\Controllers\User\Request;

use App\Service\User\Dto\UserDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class LoginUserRequest extends FormRequest
{
    public function rules(): array{
        return [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ];
    }

    public function toDto(): UserDto
    {
        $validated = $this->validated();
        return new UserDto(
            name: null,
            email: $validated['email'],
            password: Hash::make($validated['password'])
        );
    }
}
