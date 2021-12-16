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
                <div class="card-header">Chinh sua don dat {{$dondat->id}}</div>

                <div class="card-body">
                    <form action="{{ route('dondat.update', $dondat) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label text-lg-right">Khach hang</label>
                                    <div class="col-lg-6">
                                        <select name="ma_khach_hang" id="ma_khach_hang" class="form-control">
                                            @foreach($khachhangs as $kh)
                                                <option id="{{$kh->id}}" value="{{$kh->id}}" class="vegitable custom-select"
                                                @if($dondat->ma_khach_hang == $kh->id) selected @endif>
                                                    {{$kh->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label text-lg-right">Nhan vien</label>
                                    <div class="col-lg-6">
                                        <select name="ma_nhan_vien" id="ma_nhan_vien" class="form-control">
                                            @foreach($nhanviens as $nv)
                                                <option id="{{$nv->id}}" value="{{$nv->id}}" class="vegitable custom-select">
                                                    {{$nv->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label text-lg-right">Trang thai</label>
                                    <div class="col-lg-6">
                                        <select name="trang_thai" class="form-control">
                                            <option value="Chua xac nhan" @if($dondat->trang_thai == 'Chua xac nhan') selected @endif>Chua xac nhan</option>
                                            <option value="Da xac nhan" @if($dondat->trang_thai == 'Da xac nhan') selected @endif>Da xac nhan</option>
                                            <option value="Da thanh toan" @if($dondat->trang_thai == 'Da thanh toan') selected @endif>Da thanh toan</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <button id="update" type="submit" class="btn btn-warning">
                                    Update
                                </button>
                            </div>
                        </div>

                    </form>
                    @include('dondat.add_chi_tiet')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
