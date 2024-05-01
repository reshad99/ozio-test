<?php

namespace App\Http\Livewire;

use App\Models\Bonus;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public $search = '';
    public $firstDate = null;
    public $lastDate = null;
    public $filterColumn = '';
    public $filterStore = null;
    public $filterValue = null;
    public $filterToggle = 1;
    public $columns;
    public $model;

    public function mount($model, $columns, $filterColumn = null)
    {
        $this->model = new $model;
        $this->columns = $columns;
        $this->filterColumn = $filterColumn ?? array_key_first($columns);
    }

    public function render()
    {
        $this->loading = true;
        $query = $this->model::query();
        $userCardNos = User::pluck('bonus_card_no')->toArray();
        $query->whereIn('cardno', $userCardNos);

        if ($this->firstDate && $this->lastDate) {
            $query->whereHas('saleReceipts', function ($query) {
                if ($this->filterToggle)
                    $query->whereBetween('sale_date', [$this->firstDate, $this->lastDate]);
                else {
                    $query->whereNotBetween('sale_date', [$this->firstDate, $this->lastDate]);
                }
            });
        }

        if ($this->filterStore) {
            $query->whereHas('saleReceipts', function ($query) {
                $query->where('store_code', $this->filterStore);
            });
        }

        if ($this->search) {
            $query->where(function ($subQuery) {
                foreach ($this->columns as $column => $label) {
                    if (strpos($column, '.') !== false) {
                        $explode = explode('.', $column);
                        $subQuery->orWhereHas($explode[0], function ($query) use ($explode) {
                            $query->where($explode[1], 'LIKE', '%' . $this->search . '%');
                        });
                    } else {
                        $subQuery->orWhere($column, 'LIKE', '%' . $this->search . '%');
                    }
                }
            });
        }



        $data = $query->paginate(10);

        return view('livewire.datatable', ['data' => $data]);
    }
}
