@extends('Admin.App')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">CHỈNH SỬA MÀU</h1>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
        @foreach ($edit as $edit)
        <div class="row">
            <div class="col-xl-14">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Chỉnh sửa màu</h3>
                    </div>
                    <form method="post" action="{{ route('Mau.update',['Mau'=>$edit]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label  for="exampleInputname1">Tên màu</label>
                                <input type="string" class="form-control" id="exampleInputname1" placeholder="Tên màu" name="name" value="{{ $edit->TenMau }}">
                            </div>
                            <div class="custom-controls-stacked">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="trangthai" value="1" 
                                        @if ($edit->TrangThai==1)
                                        checked
                                        @endif>
                                        <span class="custom-control-label">Hoạt động</span>
                                    </label>
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="trangthai" value="2"
                                        @if ($edit->TrangThai==2)
                                        checked
                                        @endif>
                                        <span class="custom-control-label">Dừng hoạt động</span>
                                    </label>
                            </div>
                        </div>
                        
                        
                        <div class="card-footer text-end">
                            <button class="btn btn-success my-1" type="submit">Lưu</button>
                            <a href="{{ route('Mau.index') }}" class="btn btn-danger my-1">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <!-- ROW-1 CLOSED -->
    </div>
    <!--CONTAINER CLOSED -->
@endsection