<?php

namespace App\Http\Controllers;

use App\Services\Api\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $test;
    public function test()
    {
        $testService = new TestService;
        return $testService->test();
    }
}
