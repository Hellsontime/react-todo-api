<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Log;

class AuthService implements AuthServiceInterface
{
    private $_authRepository;

    public function __construct(AuthRepository $repository)
    {
        $this->_authRepository = $repository;
    }

    public function register($fields)
    {
        return $this->_authRepository->register($fields);
    }

    public function login($fields)
    {
        return $this->_authRepository->login($fields);
    }

    public function logout($request)
    {
        return $this->_authRepository->logout($request);
    }
}
