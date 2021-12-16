<?php

namespace Database\Seeders;

use App\Models\SanPham;
use Illuminate\Database\Seeder;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SanPham::updateOrCreate([
            'ma_thuong_hieu' => '1',
            'ma_loai_san_pham' => '4',
            'ten' => 'Giay Adidas',
            'don_vi' => 'Doi',
            'don_gia_nhap' => '80',
            'don_gia_ban' => '100',
            'hinh_anh' => 'giay_adidas.jpg'
        ]);

        SanPham::updateOrCreate([
            'ma_thuong_hieu' => '2',
            'ma_loai_san_pham' => '5',
            'ten' => 'Giay Nike',
            'don_vi' => 'Doi',
            'don_gia_nhap' => '180',
            'don_gia_ban' => '200',
            'hinh_anh' => 'giay_nike.jpg'
        ]);

        SanPham::updateOrCreate([
            'ma_thuong_hieu' => '3',
            'ma_loai_san_pham' => '6',
            'ten' => 'Quan Puma',
            'don_vi' => 'Chiec',
            'don_gia_nhap' => '80',
            'don_gia_ban' => '100',
            'hinh_anh' => 'quan_puma.jpeg'
        ]);

        SanPham::updateOrCreate([
            'ma_thuong_hieu' => '4',
            'ma_loai_san_pham' => '7',
            'ten' => 'Quan D&G',
            'don_vi' => 'Chiec',
            'don_gia_nhap' => '180',
            'don_gia_ban' => '200',
            'hinh_anh' => 'quan_dg.jpeg'
        ]);

        SanPham::updateOrCreate([
            'ma_thuong_hieu' => '5',
            'ma_loai_san_pham' => '8',
            'ten' => 'Ao H&M',
            'don_vi' => 'Chiec',
            'don_gia_nhap' => '80',
            'don_gia_ban' => '100',
            'hinh_anh' => 'ao_hm.jpeg'
        ]);

        SanPham::updateOrCreate([
            'ma_thuong_hieu' => '6',
            'ma_loai_san_pham' => '9',
            'ten' => 'Ao Gucci',
            'don_vi' => 'Chiec',
            'don_gia_nhap' => '180',
            'don_gia_ban' => '200',
            'hinh_anh' => 'ao_gucci.jpg'
        ]);
    }
}
