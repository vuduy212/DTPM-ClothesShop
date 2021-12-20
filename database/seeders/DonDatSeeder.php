<?php

namespace Database\Seeders;

use App\Models\DonDat;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DonDatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonDat::updateOrCreate([
            'ma_khach_hang' => '1',
            'ma_nhan_vien' => '1',
            'tong_tien' => '0',
            'trang_thai' => 'Chua xac nhan',
            'thoi_gian' => Carbon::now()
        ]);

        DonDat::updateOrCreate([
            'ma_khach_hang' => '2',
            'ma_nhan_vien' => '2',
            'tong_tien' => '250',
            'trang_thai' => 'Chua xac nhan',
            'thoi_gian' => Carbon::now()
        ]);

        DonDat::updateOrCreate([
            'ma_khach_hang' => '3',
            'ma_nhan_vien' => '3',
            'tong_tien' => '100',
            'trang_thai' => 'Da xac nhan',
            'thoi_gian' => Carbon::now()
        ]);

        DonDat::updateOrCreate([
            'ma_khach_hang' => '4',
            'ma_nhan_vien' => '4',
            'tong_tien' => '500',
            'trang_thai' => 'Da thanh toan',
            'thoi_gian' => Carbon::now()
        ]);

        DonDat::updateOrCreate([
            'ma_khach_hang' => '5',
            'ma_nhan_vien' => '5',
            'tong_tien' => '1000',
            'trang_thai' => 'Da thanh toan',
            'thoi_gian' => Carbon::now()
        ]);
    }
}
