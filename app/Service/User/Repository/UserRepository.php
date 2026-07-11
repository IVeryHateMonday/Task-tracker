<?php
declare(strict_types=1);
namespace App\Service\User\Repository;

use App\Models\User;
use App\Service\User\Dto\UserDto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserRepository
{
    public function find($id):?User{
        return User::query()->where('id',$id)->first();
    }
    public function findByEmail($email): ?User
    {
        return User::query()->where('email', $email)->first();
    }
    public function store(UserDto $userDto):void
    {
        User::query()->create([
            'name'     => $userDto->name,
            'email'    => $userDto->email,
            'password' => $userDto->password,
        ]);
    }
    public function authenticate(UserDto $dto): string
    {
        $user = $this->findByEmail($dto->email);
        if (!$user || !Hash::check($dto->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Невірні облікові дані (email або пароль).'],
            ]);
        }

        return $user->createToken('auth_token')->plainTextToken;
    }
}
