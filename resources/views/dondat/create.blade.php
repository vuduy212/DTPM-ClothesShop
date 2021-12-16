@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Them moi don dat</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dondat.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-lg-3 col-form-label text-lg-right">Khach hang</label>
                            <div class="col-lg-6">
                                <select name="ma_khach_hang" id="ma_khach_hang" class="form-select">
                                    <option value="" class="vegitable custom-select">Chon khach hang</option>
                                    @foreach($khachhangs as $kh)
                                    <option id="{{$kh->id}}" value="{{$kh->id}}" class="vegitable custom-select @error('ma_khach_hang') is-invalid @enderror">
                                        {{$kh->name}}
                                        @error('ma_khach_hang')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-lg-3 col-form-label text-lg-right">Nhan vien</label>
                            <div class="col-lg-6">
                                <select name="ma_nhan_vien" id="ma_nhan_vien" class="form-select">
                                    <option value="" class="vegitable custom-select">Chon nhan vien</option>
                                    @foreach($nhanviens as $nv)
                                        <option id="{{$nv->id}}" value="{{$kh->id}}" class="vegitable custom-select">
                                            {{$nv->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
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
