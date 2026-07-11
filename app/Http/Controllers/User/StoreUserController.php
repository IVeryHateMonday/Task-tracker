<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\Request\StoreUserRequest;
use App\Service\User\UserService;

class StoreUserController
{
    public function __construct(private readonly UserService $userService){}
    public function __invoke(StoreUserRequest $request){
        $userDto = $request->toDto();
        $this->userService->store($userDto);
        return response()->json(['message' => 'User created successfully'],201);

    }
}
