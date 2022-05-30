<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\BaseApiV1Controller;
use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\RegisterAuthRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends BaseApiV1Controller
{
    private $_authService;

    public function __construct(AuthService $authService)
    {
        $this->_authService = $authService;
    }

    /**
     * @param RegisterAuthRequest $fields
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function register(RegisterAuthRequest $fields)
    {
        return $this->_authService->register($fields);
    }

    /**
     * @param LoginAuthRequest $fields
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function login(LoginAuthRequest $fields)
    {
       return $this->_authService->login($fields);
    }

    /**
     * @param Request $request
     * @return string[]
     */
    public function logout(Request $request)
    {
        return $this->_authService->logout($request);
    }
}
