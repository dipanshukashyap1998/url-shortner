<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function Login(LoginRequest $request)
    {
        return $this->authService->login($request->email, $request->password);
    }

    public function Logout(Request $request)
    {
        return $this->authService->logout($request);
    }

    public function forgetPassword()
    {

    }

    public function register(RegisterRequest $request)
    {
        $credentials = $request->only('name', 'email', 'password');
        return $this->authService->register($credentials);
    }
}
