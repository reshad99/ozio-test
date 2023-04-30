<?php

namespace App\Services\Api;

use App\Models\User;
use App\Services\CommonService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TestService extends CommonService
{
    public function __construct()
    {
      
    }

    public function test()
{
        try {
            return response(['status' => 'success', 'data' => auth()->user()]);
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }
    }
}
