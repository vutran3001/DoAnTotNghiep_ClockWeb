@extends('Admin.App')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">TÀI KHOẢN</h1>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Họ tên</th>
                                        <th class="wd-15p border-bottom-0">Email</th>
                                        <th class="wd-15p border-bottom-0">Giới tính</th>
                                        <th class="wd-10p border-bottom-0">Ngày sinh</th>
                                        <th class="wd-25p border-bottom-0">Trạng thái</th>
                                        <th class="wd-25p border-bottom-0">Quyền</th>
                                        <th class="wd-25p border-bottom-0">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td><a>{{ $user->name }}</a></td>
                                        <td><a>{{ $user->email }}</a></td>
                                        <td>
                                            @if ($user->GioiTinh==1)
                                                <a>Nam</a>
                                            @endif
                                            @if ($user->GioiTinh==2)
                                                <a>Nữ</a>
                                            @endif
                                        </td>
                                        <td><a>{{ $user->NgaySinh }}</a></td>
                                        <td>
                                            @if ($user->TrangThai==1)
                                                <a>Hoạt động</a>
                                            @endif
                                            @if ($user->TrangThai!=1)
                                                <a>Dừng hoạt động</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->Quyen==1)
                                                <a>Quản trị viên</a>
                                            @endif
                                            @if ($user->Quyen!=1)
                                                <a>Người dùng</a>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-icon  btn-purple"><i class="fe fe-eye"></i></button>
                                            <a href="{{ route('User.edit',['User'=>$user->id]) }}"><button type="button" class="btn btn-icon  btn-success"><i class="fe fe-edit"></i></button></a>
                                            <a type="button">
                                                <form method="post" action="{{ route('User.destroy',['User'=>$user->id]) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon  btn-danger"><i class="fe fe-trash"></i></button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection