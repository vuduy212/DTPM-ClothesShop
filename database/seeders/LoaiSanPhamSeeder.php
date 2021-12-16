<?php

namespace Database\Seeders;

use App\Models\LoaiSanPham;
use Illuminate\Database\Seeder;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoaiSanPham::updateOrCreate([
            'ten_loai_san_pham' => 'Quan',
        ]);

        LoaiSanPham::updateOrCreate([
            'ten_loai_san_pham' => 'Ao',
        ]);

        LoaiSanPham::updateOrCreate([
            'ten_loai_san_pham' => 'Giay',
        ]);

        LoaiSanPham::updateOrCreate([
            'ten_loai_san_pham' => 'Quan dai',
            'ma_loai_san_pham_cha' => '1',
        ]);

        LoaiSanPham::updateOrCreate([
            'ten_loai_san_pham' => 'Quan dui',
            'ma_loai_san_pham_cha' => '1',
        ]);

        LoaiSanPham::updateOrCreate([
            'ten_loai_san_pham' => 'Ao dai',
            'ma_loai_san_pham_cha' => '2',
        ]);

        LoaiSanPham::updateOrCreate([
            'ten_loai_san_pham' => 'Ao so mi',
            'ma_loai_san_pham_cha' => '2',
        ]);

        LoaiSanPham::updateOrCreate([
            'ten_loai_san_pham' => 'Giay cao got',
            'ma_loai_san_pham_cha' => '3',
        ]);

        LoaiSanPham::updateOrCreate([
            'ten_loai_san_pham' => 'Giay the thao',
            'ma_loai_san_pham_cha' => '3',
        ]);
    }
}
