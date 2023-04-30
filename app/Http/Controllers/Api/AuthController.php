<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Auth\ApiService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new ApiService();
    }

    public function login(Request $request)
    {
        return $this->authService->login($request);
    }
}
