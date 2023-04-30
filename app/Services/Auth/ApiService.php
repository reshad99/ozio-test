<?php

namespace App\Services\Auth;

use App\Services\CommonService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiService extends CommonService
{
    public function __construct()
    {
        $this->rules = [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ];
        $this->fields = ['email', 'password'];
    }

    public function login(Request $request)
    {
        try {
            $this->ajaxValidate($request, $this->rules);
            if (!$token = auth()->guard('api')->attempt(['email' => $request->email, 'password' => $request->password])) {
                throw new Exception('Email və ya şifrə səhvdir');
            } else {
                return $this->respondWithToken($token);
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }
    }

    public function logout(Request $request)
    {
        auth()->guard('api')->logout();
        return redirect('/gopanel/login');
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => 'success',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
