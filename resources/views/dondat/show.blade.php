@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
                @endif
                <div class="card-header"></div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="name" class="col-lg-3 col-form-label text-lg-right">Khach hang</label>
                                <div class="col-lg-6">
                                    <select name="ma_khach_hang" id="ma_khach_hang" class="form-control">
                                        <option value="{{$dondat->ma_khach_hang}}" class="vegitable custom-select">
                                        {{$dondat->ma_khach_hang}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="name" class="col-lg-3 col-form-label text-lg-right">Nhan vien</label>
                                <div class="col-lg-6">
                                <select name="ma_khach_hang" id="ma_khach_hang" class="form-control">
                                        <option value="{{$dondat->ma_nhan_vien}}" class="vegitable custom-select">
                                        {{$dondat->ma_nhan_vien}}
                                        </option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="form-group row">
                                <label for="name" class="col-lg-3 col-form-label text-lg-right">Trang thai</label>
                                <div class="col-lg-6">
                                    <select name="trang_thai" class="form-control">
                                        <option value="">{{$dondat->trang_thai}}</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="name" class="col-lg-3 col-form-label text-lg-right">Thoi gian</label>
                                <div class="col-lg-6">
                                    <select name="trang_thai" class="form-control">
                                        <option value="">{{$dondat->thoi_gian}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col-md-12  mt-4" style="background-color:#f5f5f5;">
                            <div class="p-4">
                                <div class="text-center">
                                    <h4>Cac san pham</h4>
                                </div>
                            </div>
                            <table id="" class="table">
                                <thead>
                                    <tr>
                                        <!-- <th>ID</th> -->
                                        {{-- <th>Don dat</th> --}}
                                        <th>San pham</th>
                                        <th>Gia</th>
                                        <th>So luong</th>
                                    </tr>
                                </thead>
                                <tbody id="new">
                                    @foreach ($chitiets as $chitiet)
                                    <tr>
                                        <!-- <td>{{$chitiet->id}}</td> -->
                                        {{-- <td>{{$chitiet->ma_don_dat}}</td> --}}
                                        <td>{{$chitiet->ten}}</td>
                                        <td>{{$chitiet->don_gia_ban}} $</td>
                                        <td>{{$chitiet->so_luong}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <h3>Tong tien: {{$dondat->tong_tien}} $</h3>
                        </div>
                        {{-- Jquery --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection