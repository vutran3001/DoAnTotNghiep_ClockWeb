@extends('Admin.App')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <h1></h1>
        @if(session()->has('success'))
            <div class="text-wrap mb-4">
                <div class="">
                    <div class="alert alert-success">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
                        <strong>Thành Công</strong>
                        <hr class="message-inner-separator">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

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
                                            <div class="mt-sm-1 d-block">
                                                <span
                                                    class="badge bg-success-transparent rounded-pill text-success p-2 px-3">Hoạt động</span>
                                            </div>
                                            @endif
                                            @if ($user->TrangThai!=1)
                                            <div class="mt-sm-1 d-block">
                                                <span
                                                    class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">Dừng hoạt động</span>
                                            </div>
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