@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Vai tro thu {{$vaitro->id}}</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ma to chuc</th>
                            <th scope="col">Ten vai tro</th>
                            <th scope="col">Mo ta</th>
                            <th scope="col">Muc luong</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{$vaitro->id}}</th>
                                <td>{{$vaitro->ma_to_chuc}}</td>
                                <td>{{$vaitro->ten_vai_tro}}</td>
                                <td>{{$vaitro->mo_ta}}</td>
                                <td>{{$vaitro->muc_luong}}</td>
                            </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
