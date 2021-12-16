<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'san_phams';

    protected $fillable = [
        'id',
        'ma_thuong_hieu',
        'ma_loai_san_pham',
        'ten',
        'hinh_anh',
        'don_vi',
        'don_gia_nhap',
        'don_gia_ban',
        'ma_san_pham_cha'
    ];

    public function getImage()
    {
        return asset("images/sanphams/".$this->hinh_anh);
    }

    public function saveSanPham(Request $request)
    {
        $data = [
            'ma_thuong_hieu' => $request->input('ma_thuong_hieu'),
            'ma_loai_san_pham' => $request->input('ma_loai_san_pham'),
            'ten' => $request->input('ten'),
            'don_vi' => $request->input('don_vi'),
            'don_gia_nhap' => $request->input('don_gia_nhap'),
            'don_gia_ban' => $request->input('don_gia_ban'),
            'ma_san_pham_cha' => $request->input('ma_san_pham_cha'),
        ];

        //$data['hinh_anh'] = $this->saveFile($request, 'hinh_anh');

        if($request->hasFile('hinh_anh'))
        {
            $data['hinh_anh'] = $this->saveFile($request, 'hinh_anh');
        }
        else {
            $data['hinh_anh'] = 'null';
        }

        $sanpham = $this->create($data);

        return $sanpham;
    }

    private function saveFile(Request $request, string $file)
    {
        $file = $request->file($file);
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $path = public_path().'/images/sanphams/';
        $file->move($path, $fileName);
        return $fileName;
    }

    public function deleteFile(string $path)
    {
        if(file_exists($path))
        {
            File::delete($path);
        }
    }

    public function updateSanPham(Request $request, SanPham $sanphams)
    {
        $sanphams->ma_thuong_hieu = $request->input('ma_thuong_hieu');
        $sanphams->ma_loai_san_pham = $request->input('descrima_loai_san_phamption');
        $sanphams->ten = $request->input('ten');
        $sanphams->don_vi = $request->input('don_vi');
        $sanphams->don_gia_nhap = $request->input('don_gia_nhap');
        $sanphams->don_gia_ban = $request->input('don_gia_ban');
        $sanphams->ma_san_pham_cha = $request->input('ma_san_pham_cha');

        if($request->hasFile('hinh_anh'))
        {
            $path = public_path().'/images/sanphams/' . $sanphams->hinh_anh;
            $this->deleteFile($path);
            $sanphams['hinh_anh'] = $this->saveFile($request, 'hinh_anh');
        }
        else {
            $sanphams['hinh_anh'] = 'null';
        }

        $sanphams->save();
    }

    public function search(array $data)
    {
        $ten_sp = array_key_exists('key', $data) ? $data['key'] : null;
        $loai_sp = array_key_exists('loai_sp', $data) ? $data['loai_sp'] : null;

        return $this
                    ->SearchTenSP($ten_sp)
                    //->SearchLoaiSP($loai_sp)
                    ->latest('id')
                    ->paginate(array_key_exists('number', $data) ? $data['number'] : 5);
    }

    public function scopeSearchTenSP($query, $ten_sp)
    {
        return $query->where('ten', 'like', '%' . $ten_sp . '%');
    }

    public function scopeSearchLoaiSP($query, $loai_sp)
    {
        return $query->where('ma_loai_san_pham', 'like', '%' . $loai_sp . '%');
    }
}
