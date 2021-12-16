@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <h1 class="mt-4">Quan ly don dat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Welcome to Quan ly don dat !!</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dondat.create') }}" class="btn btn-primary">Them moi don dat</a>
                </div>
                <form action="{{ route('dondat.index') }}" method="GET" class="md-3 d-flex">
                    <input type="text" class="form-control" name="key" value="{{request('key')}}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ma khach hang</th>
                            <th scope="col">Ma nhan vien</th>
                            <th scope="col">Thoi gian</th>
                            <th scope="col">Trang thai</th>
                            <th scope="col">Tong tien</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($dondats as $dondat)
                            <tr>
                                <th scope="row">{{$dondat->id}}</th>
                                <td>{{$dondat->ma_khach_hang}}</td>
                                <td>{{$dondat->ma_nhan_vien}}</td>
                                <td>{{$dondat->thoi_gian}}</td>
                                <td>{{$dondat->trang_thai}}</td>
                                <td>{{$dondat->tong_tien}}</td>
                                {{-- <td>{{$dondat->vai_tros()->pluck('ten_vai_tro')->last()}}</td> --}}
                                {{-- <td>{{ implode(', ', $dondat->vai_tros()->get()->pluck('ten_vai_tro')->toArray()) }}</td> --}}
                                <td>
                                    {{-- <a href="{{ route('dondat.show', $dondat->id) }}"><button type="button" class="btn btn-success">DETAIL</button></a> --}}
                                    <a href="{{ route('dondat.edit', $dondat->id) }}"><button type="button" class="btn btn-warning">EDIT</button></a>
                                    <form action="{{ route('dondat.destroy', $dondat->id) }}" method="POST" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{-- {{$dondats->appends(request()->only('key','number'))->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
