@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
                @endif
                <div class="card-header">Them moi san pham</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sanpham.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Thuong hieu</label>
                            <div class="col-md-6">
                                <select name="ma_thuong_hieu" class="form-select form-select-sm">
                                    <option value="">Chon thuong hieu</option>
                                    @foreach ($thuong_hieus as $thuong_hieu)
                                        <option value="{{ $thuong_hieu->id }}">{{ $thuong_hieu->ten_thuong_hieu }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Loai san pham</label>
                            <div class="col-md-6">
                                <select name="ma_loai_san_pham" class="form-select form-select-sm">
                                    <option value="">Chon loai san pham</option>
                                    @foreach ($loai_san_phams as $loai_sp)
                                        <option value="{{ $loai_sp->id }}">{{ $loai_sp->ten_loai_san_pham }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Ten san pham</label>
                            <div class="col-md-6">
                                <input name="ten" type="text" value="{{ old('ten') }}" class="form-control @error('ten') is-invalid @enderror" >
                                @error('ten')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Hinh anh</label>
                            <div class="col-md-6">
                                <input id="hinh_anh" type="file" name="hinh_anh" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Don vi</label>
                            <div class="col-md-6">
                                <input name="don_vi" type="text" value="{{ old('don_vi') }}" class="form-control @error('don_vi') is-invalid @enderror" >
                                @error('don_vi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Don gia nhap</label>
                            <div class="col-md-6">
                                <input name="don_gia_nhap" type="text" value="{{ old('don_gia_nhap') }}" class="form-control @error('don_gia_nhap') is-invalid @enderror" >
                                @error('don_gia_nhap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Don gia ban</label>
                            <div class="col-md-6">
                                <input name="don_gia_ban" type="text" value="{{ old('don_gia_ban') }}" class="form-control @error('don_gia_ban') is-invalid @enderror" >
                                @error('don_gia_ban')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Them
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
