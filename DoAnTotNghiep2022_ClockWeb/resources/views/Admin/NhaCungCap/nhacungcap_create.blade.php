@extends('Admin.App')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <h1></h1>
        @if (session()->has('fail'))
        <div class="text-wrap mb-4">
            <div class="">
                <div class="alert alert-warning">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#fad383" d="M15.728,22H8.272a1.00014,1.00014,0,0,1-.707-.293l-5.272-5.272A1.00014,1.00014,0,0,1,2,15.728V8.272a1.00014,1.00014,0,0,1,.293-.707l5.272-5.272A1.00014,1.00014,0,0,1,8.272,2H15.728a1.00014,1.00014,0,0,1,.707.293l5.272,5.272A1.00014,1.00014,0,0,1,22,8.272V15.728a1.00014,1.00014,0,0,1-.293.707l-5.272,5.272A1.00014,1.00014,0,0,1,15.728,22Z"/><circle cx="12" cy="16" r="1" fill="#f7b731"/><path fill="#f7b731" d="M12,13a1,1,0,0,1-1-1V8a1,1,0,0,1,2,0v4A1,1,0,0,1,12,13Z"/></svg></span>
                    <strong>THÔNG BÁO</strong>
                    <hr class="message-inner-separator">
                    <p>{{ session()->get('fail') }}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Thêm nhà cung cấp</h1>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thêm nhà cung cấp</h3>
                    </div>
                    <form method="post" action="{{ route('NhaCungCap.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputname">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" id="exampleInputname" name="name" placeholder="Tên nhà cung cấp">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">Địa chỉ</label>
                                        <input type="text" class="form-control" id="exampleInputname" name="diachi" placeholder="Địa chỉ">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname1">SDT</label>
                                        <input type="text" class="form-control" id="exampleInputname1" name="sdt" placeholder="Số điện thoại">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-success my-1" type="submit">Lưu</button>
                            <a href="{{ route('NhaCungCap.index') }}" class="btn btn-danger my-1">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->
    </div>
    <!--CONTAINER CLOSED -->
@endsection