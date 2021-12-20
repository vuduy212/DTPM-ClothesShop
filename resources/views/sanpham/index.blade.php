@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <h1 class="mt-4">Quan ly San pham</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Welcome to Quan ly San pham !!</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('sanpham.create') }}" class="btn btn-primary">Them moi san pham</a>
                </div>
                <form action="{{ route('sanpham.index') }}" method="GET" class="md-3 d-flex">
                    <input type="text" class="form-control" name="key" value="{{request('key')}}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Thuong hieu</th>
                            <th scope="col">Loai san pham</th>
                            <th scope="col">Ten san pham</th>
                            <th scope="col">Hinh anh</th>
                            <th scope="col">Don vi</th>
                            <th scope="col">Don gia nhap</th>
                            <th scope="col">Don gia ban</th>
                            {{-- <th scope="col">Ma san pham cha</th> --}}
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($sanphams as $sp)
                            <tr>
                                <th scope="row">{{$sp->id}}</th>
                                <td>{{$sp->ma_thuong_hieu}}</td>
                                <td>{{$sp->ma_loai_san_pham}}</td>
                                <td>{{$sp->ten}}</td>
                                <td><img src="{{ $sp->getImage() }}" alt="{{ $sp->hinh_anh }}" class="image-show"></td>
                                <td>{{$sp->don_vi}}</td>
                                <td>{{$sp->don_gia_nhap}}</td>
                                <td>{{$sp->don_gia_ban}}</td>
                                {{-- <td>{{$sp->ma_san_pham_cha}}</td> --}}
                                <td>
                                    <a href=""><button type="button" class="btn btn-success">DETAIL</button></a>
                                    <a href="{{ route('sanpham.edit', $sp->id) }}"><button type="button" class="btn btn-warning">EDIT</button>
                                    <form action="{{ route('sanpham.destroy', $sp->id) }}" method="POST" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{$sanphams->appends(request()->only('key','number'))->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
