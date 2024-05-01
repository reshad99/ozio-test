   <div>

       <div class="row">
           {{-- <div class="col-md-1">
               <select wire:model.live="filterColumn" class="form-control">
                   @foreach ($columns as $column => $label)
                       <option value="{{ $column }}" @selected($loop->first)>{{ $label }}
                       </option>
                   @endforeach

                   <!-- Diğer sütunlar için seçenekler -->
               </select>

           </div> --}}

           <div class="col-md-2">
               <label for="">Baslangic tarixi</label>
               <input type="date" name="first_date" wire:model.live="firstDate" class="form-control" id="">
           </div>

           <div class="col-md-2">
               <label for="">Bitis tarixi</label>
               <input type="date" name="last_date" wire:model.live="lastDate" class="form-control" id="">
           </div>

           <div class="col md-1">
            <label for="">Secilen tarixde olub olmamasi</label>
               <div class="form-check form-switch">
                   <input class="form-check-input" wire:model.live="filterToggle" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
               </div>
           </div>

           <div class="col-md-3">
               <label for="">Axtaris</label>
               <input type="text" class="form-control" wire:model.live="search" placeholder="Search...">
           </div>

           <div class="col-md-3">
               <label for="">Magaza</label>
               <div wire:ignore>
                   <select id="storeList_select2" wire:model.live="filterStore" class="form-control" name="user_id"
                       autocomplete="off">
                       <option value="">{{ __('Magaza seçin..') }}</option>
                   </select>
               </div>

           </div>
       </div>








       <table class="table table-striped">
           <thead>
               <tr>
                   @foreach ($columns as $column => $label)
                       <th>{{ $label }}</th>
                   @endforeach
               </tr>
           </thead>
           <tbody>
               @foreach ($data as $item)
                   <tr>
                       @foreach ($columns as $column => $label)
                           <td>
                               @if (strpos($column, '.') !== false)
                                   @php
                                       $relations = explode('.', $column);
                                       $relatedItem = $item;
                                       foreach ($relations as $relation) {
                                           $relatedItem = $relatedItem->{$relation};
                                       }
                                   @endphp
                                   {{ $relatedItem }}
                               @else
                                   {{ $item->{$column} }}
                               @endif
                           </td>
                       @endforeach
                       <td><!-- Button trigger modal -->
                           <button type="button" class="btn btn-primary sale-modal"
                               data-sale-receipts="{{ $item->saleReceipts }}" data-bs-toggle="modal"
                               data-bs-target="#saleModal">
                               Satis kecmisi
                           </button>

                       </td>
                   </tr>
               @endforeach
           </tbody>
       </table>

       {{ $data->links('livewire::bootstrap') }}


   </div>
