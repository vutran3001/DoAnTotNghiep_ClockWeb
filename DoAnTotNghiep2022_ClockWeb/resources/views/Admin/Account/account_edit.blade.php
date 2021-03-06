@extends('Admin.App')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">CHỈNH SỬA THÔNG TIN CÁ NHÂN</h1>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
        @foreach ($edit as $e)
        <div class="row">
            <div class="col-xl-14">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Chỉnh sửa thông tin cá nhân</h3>
                    </div>
                    <form method="post" action="{{ route('User.update',['User'=>$e]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="text-center chat-image mb-5">
                                <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                    <a class="" href="profile.html"><img alt="avatar" src="../../Admin/assets/images/users/7.jpg" class="brround"></a>
                                </div>
                                <div class="main-chat-msg-name">
                                    <a href="profile.html">
                                        <h5 class="mb-1 text-dark fw-semibold">{{ $e->name }}</h5>
                                    </a>
                                    <p class="text-muted mt-0 mb-0 pt-0 fs-13">@if ($e->Quyen==1)
                                        Quản trị viên
                                    @else
                                        Người dùng
                                    @endif</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">Họ tên</label>
                                        <input type="text" class="form-control" id="exampleInputname" placeholder="Họ tên" name="name" value="{{ $e->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname1">Email</label>
                                        <input type="text" class="form-control" id="exampleInputname1" placeholder="Email" name="email" value="{{ $e->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 form-control" type="password" placeholder="Password" name="password" value="{{ $e->password }}">
                                </div>
                            </div>
                            <div class="custom-controls-stacked">
                                <label for="exampleInputEmail1">Giới tính</label>
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="gt" value="1" 
                                        @if ($e->GioiTinh==1)
                                        checked
                                        @endif>
                                        <span class="custom-control-label">Nam</span>
                                    </label>
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="gt" value="2"
                                        @if ($e->GioiTinh==2)
                                        checked
                                        @endif>
                                        <span class="custom-control-label">Nữ</span>
                                    </label>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">Ngày sinh</label>
                                        <input type="text" class="form-control" id="exampleInputname" placeholder="Ngày sinh" name="date" value="{{ $e->NgaySinh }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname1">SDT</label>
                                        <input type="text" class="form-control" id="exampleInputname1" placeholder="SDT" name="sdt" value="{{ $e->SDT }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="exampleInputname1">Địa chỉ</label>
                                <input type="string" class="form-control" id="exampleInputname1" placeholder="Địa chỉ" name="address" value="{{ $e->DiaChi }}">
                            </div>
                            <div class="custom-controls-stacked">
                                <label for="exampleInputEmail1">Quyền</label>
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="quyen" value="1" 
                                        @if ($e->Quyen==1)
                                        checked
                                        @endif>
                                        <span class="custom-control-label">Quản trị viên</span>
                                    </label>
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="quyen" value="2"
                                        @if ($e->Quyen==2)
                                        checked
                                        @endif>
                                        <span class="custom-control-label">Người dùng</span>
                                    </label>
                            </div>
                            <div class="custom-controls-stacked">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="trangthai" value="1" 
                                        @if ($e->TrangThai==1)
                                        checked
                                        @endif>
                                        <span class="custom-control-label">Hoạt động</span>
                                    </label>
                                <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="trangthai" value="2"
                                        @if ($e->TrangThai==2)
                                        checked
                                        @endif>
                                        <span class="custom-control-label">Dừng hoạt động</span>
                                    </label>
                            </div>
                        </div>
                        
                        
                        <div class="card-footer text-end">
                            <button class="btn btn-success my-1" type="submit">Lưu</button>
                            <a href="{{ route('User.index') }}" class="btn btn-danger my-1">Quay lại</a>
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