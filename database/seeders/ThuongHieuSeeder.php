<?php

namespace Database\Seeders;

use App\Models\ThuongHieu;
use Illuminate\Database\Seeder;

class ThuongHieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThuongHieu::updateOrCreate([
            'ten_thuong_hieu' => 'Adidas',
        ]);

        ThuongHieu::updateOrCreate([
            'ten_thuong_hieu' => 'Nike',
        ]);

        ThuongHieu::updateOrCreate([
            'ten_thuong_hieu' => 'Puma',
        ]);

        ThuongHieu::updateOrCreate([
            'ten_thuong_hieu' => 'D&G',
        ]);

        ThuongHieu::updateOrCreate([
            'ten_thuong_hieu' => 'H&M',
        ]);

        ThuongHieu::updateOrCreate([
            'ten_thuong_hieu' => 'Gucci',
        ]);
    }
}
