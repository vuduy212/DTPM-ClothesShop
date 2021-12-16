<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ThuongHieuSeeder::class);
        $this->call(LoaiSanPhamSeeder::class);
        $this->call(SanPhamSeeder::class);
        $this->call(DonDatSeeder::class);
    }
}
