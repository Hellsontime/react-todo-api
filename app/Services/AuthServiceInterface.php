<?php

namespace App\Services;

use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\RegisterAuthRequest;
use Illuminate\Http\Request;

interface AuthServiceInterface
{
    public function register(RegisterAuthRequest $fields);
    public function login(LoginAuthRequest $fields);
    public function logout(Request $request);
}

