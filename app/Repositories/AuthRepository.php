<?php

namespace App\Repositories;

use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\RegisterAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{
    private $_user;

    public function __construct(User $user)
    {
        $this->_user = $user;
    }

    public function register(RegisterAuthRequest $fields)
    {
        $user = $this->_user->create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('wcgtoken')->plainTextToken;

        $response = [
            'user' => $user->toArray(),
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function login(LoginAuthRequest $fields)
    {
        //check email
        $user = $this->_user->where('email', $fields['email'])->first();

        //check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid Username or Password!'
            ], 401);
        }

        $token = $user->createToken('wcgtoken')->plainTextToken;

        $response = [
            'user' => $user->toArray(),
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out.',
        ];
    }
}
