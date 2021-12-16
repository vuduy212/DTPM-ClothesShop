<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::updateOrCreate([
            'name' => 'Dịu',
            'email' => '1@gmail.com',
            'password' => bcrypt('12345678'),
            'loai_tai_khoan' => 'nhan_vien'
        ]);

        $admin = User::updateOrCreate([
            'name' => 'An',
            'email' => '2@gmail.com',
            'password' => bcrypt('12345678'),
            'loai_tai_khoan' => 'nhan_vien'
        ]);

        $admin = User::updateOrCreate([
            'name' => 'Quỳnh',
            'email' => '3@gmail.com',
            'password' => bcrypt('12345678'),
            'loai_tai_khoan' => 'nhan_vien'
        ]);

        $admin = User::updateOrCreate([
            'name' => 'Bình',
            'email' => '4@gmail.com',
            'password' => bcrypt('12345678'),
            'loai_tai_khoan' => 'nhan_vien'
        ]);

        $admin = User::updateOrCreate([
            'name' => 'Ngọc',
            'email' => '5@gmail.com',
            'password' => bcrypt('12345678'),
            'loai_tai_khoan' => 'nhan_vien'
        ]);

        $client = User::updateOrCreate([
            'name' => 'Hiếu',
            'email' => '6@gmail.com',
            'password' => bcrypt('12345678'),
            'loai_tai_khoan' => 'khach_hang'
        ]);

        $client = User::updateOrCreate([
            'name' => 'Trang',
            'email' => '7@gmail.com',
            'password' => bcrypt('12345678'),
            'loai_tai_khoan' => 'khach_hang'
        ]);

        $client = User::updateOrCreate([
            'name' => 'Cường',
            'email' => '8@gmail.com',
            'password' => bcrypt('12345678'),
            'loai_tai_khoan' => 'khach_hang'
        ]);

        $client = User::updateOrCreate([
            'name' => 'Linh',
            'email' => '9@gmail.com',
            'password' => bcrypt('12345678'),
            'loai_tai_khoan' => 'khach_hang'
        ]);

        $client = User::updateOrCreate([
            'name' => 'Hương',
            'email' => '10@gmail.com',
            'password' => bcrypt('12345678'),
            'loai_tai_khoan' => 'khach_hang'
        ]);
    }
}
