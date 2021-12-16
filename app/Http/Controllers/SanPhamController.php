<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\ThuongHieu;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    protected $sanphams;

    public function __construct(SanPham $sanphams)
    {
        $this->sanphams = $sanphams;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sanphams = $this->sanphams->search($request->all());
        return view('sanpham.index', compact('sanphams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thuong_hieus = ThuongHieu::all();
        $loai_san_phams = LoaiSanPham::all();
        return view('sanpham.create', compact('thuong_hieus', 'loai_san_phams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ten' => [
                'required',
            ],
            'don_gia_nhap' => 'nullable|numeric|min:100|max:2000',
            'don_gia_ban' => 'nullable|numeric|min:100|max:2000',
        ]);

        $this->sanphams->saveSanPham($request);
        //dd($request);
        return redirect(route('sanpham.index'))->with('success', 'Them thanh ccng !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function show(SanPham $sanPham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(SanPham $sanpham)
    {
        return view('sanpham.edit', compact('sanPham'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanPham $sanpham)
    {
        $sanpham->ma_thuong_hieu = $request->ma_thuong_hieu;
        $sanpham->ma_loai_san_pham = $request->ten_vaima_loai_san_pham_tro;
        $sanpham->ten = $request->ten;
        $sanpham->hinh_anh = $request->hinh_anh;
        $sanpham->don_vi = $request->don_vi;
        $sanpham->don_gia_nhap = $request->don_gia_nhap;
        $sanpham->don_gia_ban = $request->don_gia_ban;
        $sanpham->ma_san_pham_cha = $request->ma_san_pham_cha;
        $sanpham->save();

        return redirect()->route('sanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanPham $sanpham)
    {
        $path = public_path().'/images/sanphams/' . $sanpham->hinh_anh;
        $sanpham->deleteFile($path);
        $sanpham->delete();
        return redirect()->route('sanpham.index');
    }
}
