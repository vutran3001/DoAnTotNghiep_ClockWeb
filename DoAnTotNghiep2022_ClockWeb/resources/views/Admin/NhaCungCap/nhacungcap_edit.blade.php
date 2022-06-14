@extends('Admin.App')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">CHỈNH SỬA THÔNG TIN NHÀ CUNG CẤP</h1>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Chỉnh sửa thông tin nhà cung cấp</h3>
                    </div>
                    @foreach ($edit as $edit)
                    <form method="post" action="{{ route('NhaCungCap.update',['NhaCungCap'=>$edit]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputname">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" id="exampleInputname" name="name" placeholder="Tên nhà cung cấp" value="{{ $edit->TenNhaCungCap }}">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">Địa chỉ</label>
                                        <input type="text" class="form-control" id="exampleInputname" name="diachi" placeholder="Địa chỉ" value="{{ $edit->DiaChi }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname1">SDT</label>
                                        <input type="text" class="form-control" id="exampleInputname1" name="sdt" placeholder="Số điện thoại" value="{{ $edit->SDT }}">
                                    </div>
                                </div>
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
                                        @if ($edit->TrangThai!=1)
                                        checked
                                        @endif>
                                        <span class="custom-control-label">Dừng hoạt động</span>
                                    </label>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-success my-1" type="submit">Lưu</button>
                            <a href="{{ route('NhaCungCap.index') }}" class="btn btn-danger my-1">Quay lại</a>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->
    </div>
    <!--CONTAINER CLOSED -->
@endsection