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
        return User::where('id',$id)->first();
    }
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }
    public function store(UserDto $userDto):void
    {
        User::create([
            'name'     => $userDto->name,
            'email'    => $userDto->email,
            'password' => $userDto->password,
        ]);
    }
    public function authenticate(string $email, string $password): string
    {
        $user = $this->findByEmail($email);
        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Невірні облікові дані (email або пароль).'],
            ]);
        }

        return $user->createToken('auth_token')->plainTextToken;
    }
}
