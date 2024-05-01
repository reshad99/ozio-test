<?php

namespace App\Http\Controllers\Admin\Business;

use App\Http\Controllers\Controller;
use App\Services\Business\StoreService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private StoreService $storeService;
    public function __construct()
    {
        $this->storeService = new StoreService();
    }

    public function search(Request $request)
    {
        $request->validate(['q' => ['required', 'string']]);
        return $this->storeService->search($request->q);
    }

    public function getSaleReceipts(Request $request)
    {
        $request->validate(['cardno'=> ['required', 'string']]);
    }
}