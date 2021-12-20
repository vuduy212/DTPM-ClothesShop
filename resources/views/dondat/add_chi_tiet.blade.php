<div class="col">
    <form action="{{ route('dondat.them_chi_tiet_don_dat') }}" method="POST">
        @csrf
        <div class="form-group row">
            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">Vai tro</label> --}}
            <div class="col-md-12 mt-4">
                <div class="container-fluid">
                <h4 class="text-center" style="color:green"> Them san pham </h4>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" style="background-color:#e0e0e0;" >

                            <thead>
                                <tr>
                                    <th>Ma don dat</th>
                                    <th>San pham</th>
                                    <th>So luong</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="">
                                <tr>
                                    <td>
                                        <select name="ma_don_dat" id="ma_don_dat">
                                            <option id={{$dondat->id}} value={{$dondat->id}}>{{$dondat->id}}</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="ma_san_pham" id="ma_san_pham" class="form-select @error('ma_san_pham') is-invalid @enderror">
                                        @foreach($sanphams as $sp)
                                            <option id="{{$sp->id}}" value="{{$sp->id}}">
                                                {{$sp->ten}}
                                            </option>
                                        @endforeach
                                        </select>
                                        @error('ma_san_pham')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Sản phẩm đã tồn tại</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" id="so_luong" name="so_luong" min="1" value="1" class="form-control @error('so_luong') is-invalid @enderror">
                                        @error('so_luong')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td><button id="add" class="btn btn-success">Add</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function(){
                $('#add').on('click',function(){

                    var ma_don_dat = $('select[name="ma_don_dat"]').val();
                    var ma_san_pham = $('select[name="ma_san_pham"]').val();
                    var so_luong = $('input[name="so_luong"]').val();

                    if(ma_don_dat!="" && ma_san_pham!=""){
                        $.ajax({
                            url: location.origin + 'dondat/them_chi_tiet_don_dat',
                            type: "POST",
                            data: {
                                ma_don_dat: ma_don_dat,
                                ma_san_pham: ma_san_pham,
                                so_luong: so_luong,
                            },
                        });
                        // alert('Them vai tro ' + ma_vai_tro + ' !');
                    }
                    else{
                        alert('Vui long nhap day du va chinh xac thong tin !');
                    }

                    //$('#new').append('<tr><td>'+ma_vai_tro+'</td><td>'+tu_ngay+'</td><td>'+den_ngay+'</td><td>'+mo_ta+'</td><td>'+luong_co_ban+'</td><td><button class="btn btn-danger btnDelete">DELETE</button></td></tr>');
                });

                // $('.btnDelete').on('click',function(){
                //     $(this).closest("tr").remove();
                // });
            });
        </script>
    </form>
    {{-- form them / form list --}}
    <div class="col-md-12  mt-4" style="background-color:#f5f5f5;">
        <div class="p-4">
            <div class="text-center">
                <h4>Cac san pham da chon </h4>
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
                    <th>Action</th>
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
                    <td>
                        <form action="{{ route('dondat.delete_chi_tiet_don_dat', $chitiet->id) }}" method="POST" class="float-left">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btnDelete">DELETE</button>
                        </form>
                    </td>
                    {{-- <td><button class="btn btn-danger btnDelete">DELETE</button></td> --}}
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
