<?php

namespace App\Http\Controllers\Admin\Business;

use App\Http\Controllers\Controller;
use App\Services\Business\StoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    private StoreService $storeService;
    public function __construct()
    {
        $this->storeService = new StoreService();
    }

    public function search(Request $request)
    {
        // $request->validate(['q' => ['required', 'string']]);
        Log::info($request->all());
        return $this->storeService->search($request->q);
    }
}
