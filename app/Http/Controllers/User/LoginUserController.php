<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\Request\LoginUserRequest;
use App\Service\User\UserService;
use Illuminate\Http\JsonResponse;

class LoginUserController
{
    public function __construct(private readonly UserService $userService){}
    public function __invoke(LoginUserRequest $request): JsonResponse
    {
        $token = $this->userService->authenticate(
            $request->input('email'),
            $request->input('password')
        );

        return response()->json([
            'message'      => 'Login successful',
            'access_token' => $token,
            'token_type'   => 'Bearer'
        ]);
    }
}
