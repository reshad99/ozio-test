<?php

namespace App\Services\Business;

use App\Helpers\Select2;
use App\Repositories\StoreRepository;
use App\Services\CommonService;
use Illuminate\Support\Facades\Log;

class StoreService extends CommonService
{
    public function __construct()
    {
        parent::__construct(new StoreRepository);
    }

    public function search(string $value)
    {
        try {
            $data = ['name' => $value];
            $result = $this->mainRepository->search($data);
            $formattedResult = Select2::getData($result, 'name');

            return $formattedResult;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
