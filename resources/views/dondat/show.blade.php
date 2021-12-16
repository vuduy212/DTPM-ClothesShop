@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Nhan su so {{$nhansu->id}}</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ten</th>
                            <th scope="col">Loai nhan su</th>
                            <th scope="col">Ngay sinh</th>
                            <th scope="col">Gioi tinh</th>
                            <th scope="col">SDT</th>
                            <th scope="col">Email</th>
                            <th scope="col">Dan toc</th>
                            <th scope="col">Que quan</th>
                            <th scope="col">CMND</th>
                            <th scope="col">Trinh do</th>
                            <th scope="col">Mo ta</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{$nhansu->id}}</th>
                                <td>{{$nhansu->ten_nhan_su}}</td>
                                <td>{{$nhansu->loai_nhan_su}}</td>
                                <td>{{$nhansu->ngay_sinh}}</td>
                                <td>{{$nhansu->gioi_tinh}}</td>
                                <td>{{$nhansu->SDT}}</td>
                                <td>{{$nhansu->email}}</td>
                                <td>{{$nhansu->dan_toc}}</td>
                                <td>{{$nhansu->que_quan}}</td>
                                <td>{{$nhansu->CMND}}</td>
                                <td>{{$nhansu->trinh_do}}</td>
                                <td>{{$nhansu->mo_ta}}</td>
                            </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
