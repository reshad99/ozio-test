<?php

namespace App\Repositories;

use App\Models\SaleReceipts;
use App\Models\Store;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreRepository implements DefaultModelInterface
{
    public function search(array $data): ?LengthAwarePaginator
    {
        $query = Store::query();
        foreach ($data as $column => $value) {
            if (array_key_first($data) == $column) {
                $query->where($column, 'LIKE', '%' . $value . '%');
            } else {
                $query->orWhere($column, 'LIKE', '%' . $value . '%');
            }
        }
        return $query->paginate(10);
    }
}