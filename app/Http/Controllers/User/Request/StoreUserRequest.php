<?php

namespace App\Http\Controllers\User\Request;

use App\Service\User\Dto\UserDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreUserRequest extends FormRequest
{
    public function rules(): array{
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }

    public function toDto(): UserDto
    {
        $validated = $this->validated();
        return new UserDto(
            name: $validated['name'],
            email: $validated['email'],
            password: Hash::make($validated['password'])
        );
    }
}
