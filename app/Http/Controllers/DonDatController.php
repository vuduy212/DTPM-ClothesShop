<?php

namespace App\Http\Controllers;

use App\Models\DonDat;
use App\Models\SanPham;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonDatController extends Controller
{
    protected $dondats;

    public function __construct(DonDat $dondats)
    {
        $this->dondats = $dondats;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dondats = DonDat::all();
        return view('dondat.index', compact('dondats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khachhangs = User::where('loai_tai_khoan', 'khach_hang')->get();
        $nhanviens = User::where('loai_tai_khoan', 'nhan_vien')->get();
        return view('dondat.create', compact('khachhangs', 'nhanviens'));
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
            'ma_khach_hang' => 'required',
        ]);
        $this->dondats->saveDonDat($request);
        return redirect(route('dondat.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DonDat  $donDat
     * @return \Illuminate\Http\Response
     */
    public function show(DonDat $dondat)
    {
        $khachhangs = User::where('loai_tai_khoan', 'khach_hang')->get();
        $nhanviens = User::where('loai_tai_khoan', 'nhan_vien')->get();
        $sanphams = SanPham::all();

        $chitiets = DB::table('chi_tiet_don_dats')
        ->join('don_dats', 'chi_tiet_don_dats.ma_don_dat', '=', 'don_dats.id')
        ->join('san_phams', 'chi_tiet_don_dats.ma_san_pham', '=', 'san_phams.id')
        ->where('chi_tiet_don_dats.ma_don_dat', '=', $dondat->id)
        ->select('chi_tiet_don_dats.*', 'san_phams.ten', 'san_phams.don_gia_ban')
        ->orderBy('id', 'DESC')
        ->get();

        return view('dondat.show', compact('dondat', 'sanphams', 'chitiets', 'khachhangs', 'nhanviens'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DonDat  $donDat
     * @return \Illuminate\Http\Response
     */
    public function edit(DonDat $dondat)
    {
        $khachhangs = User::where('loai_tai_khoan', 'khach_hang')->get();
        $nhanviens = User::where('loai_tai_khoan', 'nhan_vien')->get();
        $sanphams = SanPham::all();

        $chitiets = DB::table('chi_tiet_don_dats')
        ->join('don_dats', 'chi_tiet_don_dats.ma_don_dat', '=', 'don_dats.id')
        ->join('san_phams', 'chi_tiet_don_dats.ma_san_pham', '=', 'san_phams.id')
        ->where('chi_tiet_don_dats.ma_don_dat', '=', $dondat->id)
        ->select('chi_tiet_don_dats.*', 'san_phams.ten', 'san_phams.don_gia_ban')
        ->orderBy('id', 'DESC')
        ->get();

        return view('dondat.edit', compact('dondat', 'sanphams', 'chitiets', 'khachhangs', 'nhanviens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DonDat  $donDat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DonDat $dondat)
    {
        $dondat->tong_tien = '0';

        $moneys = DB::table('chi_tiet_don_dats')
        ->join('don_dats', 'chi_tiet_don_dats.ma_don_dat', '=', 'don_dats.id')
        ->join('san_phams', 'chi_tiet_don_dats.ma_san_pham', '=', 'san_phams.id')
        ->where('chi_tiet_don_dats.ma_don_dat', '=', $dondat->id)
        ->select('chi_tiet_don_dats.*', 'san_phams.don_gia_ban')
        ->orderBy('id', 'DESC')
        ->get();

        foreach ($moneys as $money) {
            $dondat->tong_tien += $money->so_luong * $money->don_gia_ban;
        }

        $dondat->ma_khach_hang = $request->ma_khach_hang;
        $dondat->thoi_gian = $request->thoi_gian;
        $dondat->ma_nhan_vien = $request->ma_nhan_vien;
        // $dondat->trang_thai = $request->trang_thai;
        $dondat->thoi_gian = Carbon::now();
        $dondat->save();

        return redirect()->back()->with('success', 'Update thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DonDat  $donDat
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonDat $dondat)
    {
        $dondat->delete();
        return redirect()->route('dondat.index');
    }

    public function them_chi_tiet_don_dat(Request $request)
    {
        $this->validate($request, [
            'ma_san_pham' => 'required|unique:chi_tiet_don_dats',
            'so_luong' => 'required|numeric',
        ]);
        DB::table('chi_tiet_don_dats')->insert([
            'ma_san_pham' => $request->ma_san_pham,
            'ma_don_dat' => $request->ma_don_dat,
            'so_luong' => $request->so_luong]
        );

        return redirect()->back();
        //return redirect()->back()->with('success', 'Thêm thành công!');
    }

    public function delete_chi_tiet_don_dat(int $id)
    {
        DB::table('chi_tiet_don_dats')->where('id', $id)->delete();
        return redirect()->back();
        //return redirect()->back()->with('success', 'Delete thành công!');
    }
}
