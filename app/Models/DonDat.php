<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DonDat extends Model
{
    use HasFactory;

    protected $table = 'don_dats';

    protected $fillable = [
        'id',
        'ma_khach_hang',
        'thoi_gian',
        'ma_nhan_vien',
        'trang_thai',
        'tong_tien',
    ];

    public function san_phams()
    {
        return $this->belongsToMany(SanPham::class, 'chi_tiet_don_dats', 'ma_don_dat', 'ma_san_pham')->withPivot('so_luong');
    }

    public function saveDonDat(Request $data)
    {
        $thoi_gian = Carbon::now();
        $dondat = $this->create([
            'ma_khach_hang' => $data['ma_khach_hang'],
            'thoi_gian' => $thoi_gian,
            'ma_nhan_vien' => $data['ma_nhan_vien'],
            'trang_thai' => 'Chua xac nhan',
            'tong_tien' => '0',
        ]);

        return $dondat;
    }
}
