@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mt-0 header-title">istifadəçilərin Siyahısı</h4>
                        </div>
                        <div class="col-md-6" style="text-align: right">@include('admin.pages.user.components.buttons')</div>
                    </div>
                    @livewire('datatable', ['model' => \App\Models\Bonus::class, 'columns' => ['cardno' => 'Kart nomresi', 'user.name' => 'Istifadeci adi']])
                </div>
            </div>
        </div>
        <!-- end col -->
        @include('admin.pages.user.components.sale-modal')
    </div>
@endsection

@push('js_stack')
    <script>
        $('#storeList_select2').select2({
            placeholder: "Mağaza axtar!",
            ajax: {
                url: "{{ route('admin.store.search') }}",
                delay: 250,
                dataType: 'json',
            }
        });

        $('#storeList_select2').on('select2:select', function(e) {
            var data = e.params.data;
            var componentId = $(this).closest('[wire\\:id]').attr('wire:id');
            var livewireComponent = window.livewire.find(componentId);

            livewireComponent.set('filterStore', data.id);
        });


        $(document).on("click", ".accordion-row", function() {
            var accordionRow = $(this).next(".accordion");
            if (!accordionRow.is(":visible")) {
                accordionRow.show().find(".accordion-content").slideDown();
            } else {
                accordionRow.find(".accordion-content").slideUp(function() {
                    if (!$(this).is(':visible')) {
                        accordionRow.hide();
                    }
                });
            }
        });

        $(document).ready(function() {

            $(document).on('click', '.sale-detail-button', function() {
                var detailContainer = $(this).closest('.accordion').find('.accordion-content');

                if (!detailContainer.is(':visible')) {
                    detailContainer.slideDown();
                } else {
                    detailContainer.slideUp();
                }
            });

            $(document).on('click', '.sale-modal', function(e) {
                var sales = $(this).data('sale-receipts');
                var saleBody = $('.sale-body');

                saleBody.html('');

                if (sales.length == 0) {
                    saleBody.html(`<div class="row"><div class="col-md-12"> Mehsul yoxdur</div></div>`);

                }

                sales.forEach(sale => {
                    var itemsHtml = '';
                    sale.items.forEach(item => {
                        itemsHtml += `
                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>ID:</strong> ${item.id}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Ad:</strong> ${item.name}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Qiymet:</strong> ${item.price}</p>
                        </div>
                    </div>`;
                    });

                    var saleRowHtml = `
                <tr class="accordion-row">
                    <td>${sale.id}</td>
                    <td>${sale.sale_date}</td>
                    <td><button class="btn btn-info sale-detail-button">Mehsulları Göster</button></td>
                </tr>
                <tr class="accordion" style="display: none;">
                    <td colspan="3">
                        <div class="accordion-content">
                            ${itemsHtml}
                        </div>
                    </td>
                </tr>`;

                    saleBody.append(saleRowHtml);
                });
            });
        });
    </script>
@endpush
