<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =
        [
            [
                'Bildirişlər siyahısı',
                'notifications.index',
                'web'
            ],
            [
                'Bildiriş əlavə et',
                'notifications.create',
                'web'
            ],
            [
                'Türkiyə karqoları',
                'cargo_turkey.index',
                'web'
            ],
            [
                'Türkiyə karqosu əlavə et',
                'cargo_turkey.create',
                'web'
            ],
            [
                'Türkiyə karqosu yenilə',
                'cargo_turkey.edit',
                'web'
            ],
            [
                'Türkiyə karqosu sil',
                'cargo_turkey.destroy',
                'web'
            ],
            [
                'Sorğular siyahısı',
                'requests.index',
                'web'
            ],
            [
                'Sorğu əlavə et',
                'requests.create',
                'web'
            ],
            [
                'Sorğu yenilə',
                'requests.edit',
                'web'
            ],
            [
                'Sorğu sil',
                'requests.destroy',
                'web'
            ],
            [
                'Çatdırılma ofisləri siyahısı',
                'delivery_office.index',
                'web'
            ],
            [
                'Çatdırılma ofisi əlavə et',
                'delivery_office.create',
                'web'
            ],
            [
                'Çatdırılma ofisi yenilə',
                'delivery_office.edit',
                'web'
            ],
            [
                'Çatdırılma ofisi sil',
                'delivery_office.destroy',
                'web'
            ],
            [
                'Rəflər siyahısı',
                'internal_boxes.index',
                'web'
            ],
            [
                'Rəf əlavə et',
                'internal_boxes.create',
                'web'
            ],
            [
                'Rəf yenilə',
                'internal_boxes.edit',
                'web'
            ],
            [
                'Rəf sil',
                'internal_boxes.destroy',
                'web'
            ],
            [
                'Loglar siyahı',
                'logs.index',
                'web'
            ],
            [
                'Hesabatlar siyahısı',
                'reports.index',
                'web'
            ],
            [
                'Sifarişlər siyahısı',
                'order-items.index',
                'web'
            ],
            [
                'Anbar sorğuları',
                'warehouse.index',
                'web'
            ],
            [
                'Mağaza siyahısı',
                'shops.index',
                'web'
            ],
            [
                'Mağaza əlavə et',
                'shops.create',
                'web'
            ],
            [
                'Mağaza yenilə',
                'shops.edit',
                'web'
            ],
            [
                'Mağaza sil',
                'shops.destroy',
                'web'
            ],
            [
                'Promo kod siyahısı',
                'promo-codes.index',
                'web'
            ],
            [
                'Promo kod əlavə et',
                'promo-codes.create',
                'web'
            ],
            [
                'Promo kod yenilə',
                'promo-codes.edit',
                'web'
            ],
            [
                'Promo kod sil',
                'promo-codes.destroy',
                'web'
            ],
            [
                'Kateqoriya siyahısı',
                'product-types.index',
                'web'
            ],
            [
                'Kateqoriya əlavə et',
                'product-types.create',
                'web'
            ],
            [
                'Kateqoriya yenilə',
                'product-types.edit',
                'web'
            ],
            [
                'Kateqoriya sil',
                'product-types.destroy',
                'web'
            ],
            [
                'Regionlar siyahısı',
                'delivery-region.index',
                'web'
            ],
            [
                'Region əlavə et',
                'delivery-region.create',
                'web'
            ],
            [
                'Region yenilə',
                'delivery-region.edit',
                'web'
            ],
            [
                'Region sil',
                'delivery-region.destroy',
                'web'
            ],
            [
                'Xaricdəki ünvanlar siyahısı',
                'delivery-address.index',
                'web'
            ],
            [
                'Xaricdəki ünvan əlavə et',
                'delivery-address.create',
                'web'
            ],
            [
                'Xaricdəki ünvan yenilə',
                'delivery-address.edit',
                'web'
            ],
            [
                'Xaricdəki ünvan sil',
                'delivery-address.destroy',
                'web'
            ],
            [
                'Daxili ünvanlar siyahısı',
                'internal-offices.index',
                'web'
            ],
            [
                'Daxili ünvan əlavə et',
                'internal-offices.create',
                'web'
            ],
            [
                'Daxili ünvan yenilə',
                'internal-offices.edit',
                'web'
            ],
            [
                'Daxili ünvan sil',
                'internal-offices.destroy',
                'web'
            ],
            [
                'Veb sayt əməliyyatlar siyahısı',
                'web-site.index',
                'web'
            ],
            [
                'Veb sayta əlavə et',
                'web-site.create',
                'web'
            ],
            [
                'Veb saytda yenilə',
                'web-site.edit',
                'web'
            ],
            [
                'Veb saytda sil',
                'web-site.destroy',
                'web'
            ],
            [
                'Müştəri Prossesi',
                'process.index',
                'web'
            ],
            [
                'Müştəri Prossesi Linklər',
                'process.order.items.index',
                'web'
            ],
            [
                'Müştəri Prossesi Sorğular',
                'process.requests',
                'web'
            ],
            [
                'Müştəri Prossesi Balans',
                'process.balances',
                'web'
            ],
            [
                'Müştəri Prossesi İnvoyslar',
                'process.invoys',
                'web'
            ],
            [
                'Müştəri Prossesi Loglar',
                'process.logs',
                'web'
            ],
            [
                'Müştəri Prossesi İcra olunmuş linklər',
                'process.order.items.icra',
                'web'
            ],
            [
                'Müştəri Prossesi Bağlamalar Düzəliş',
                'process.batches.edit',
                'web'
            ],
            [
                'Müştəri Prossesi Bağlamalar Sil',
                'process.batches.delete',
                'web'
            ],
            [
                'Müştəri Prossesi Bağlamalar İade',
                'process.batches.iade',
                'web'
            ],
            [
                'Müştəri Prossesi Bağlamalar Tehvil vermə',
                'process.batches.tehvil',
                'web'
            ],
            [
                'Müştəri Prossesi Bağlamalar Transfer',
                'process.batches.transfer',
                'web'
            ],
            [
                'Müştəri Prossesi Bağlamalar Status dəyişmə',
                'process.batches.change.status',
                'web'
            ],
            [
                'Kassalar siyahısı',
                'cash-register.index',
                'web'
            ],
            [
                'Kassa əlavə et',
                'cash-register.create',
                'web'
            ],
            [
                'Kassa yenilə',
                'cash-register.edit',
                'web'
            ],
            [
                'Kassa sil',
                'cash-register.destroy',
                'web'
            ],
        ];

        foreach ($data as $key => $item) {
            $permission = new Permission();
            $permission->title = $item[0];
            $permission->name = $item[1];
            $permission->guard_name = $item[2];
            $permission->save();
        }
    }
}
