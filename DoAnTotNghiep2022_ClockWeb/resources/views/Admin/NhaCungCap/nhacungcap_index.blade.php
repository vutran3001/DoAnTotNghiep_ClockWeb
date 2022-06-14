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
        <h1 class="page-title">Nhà cung cấp</h1>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('NhaCungCap.create') }}" class="btn btn-primary">Thêm nhà cung cấp</a>
                    <h1></h1>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">ID</th>
                                    <th class="wd-15p border-bottom-0">Tên nhà cung cấp</th>
                                    <th class="wd-15p border-bottom-0">Địa chỉ</th>
                                    <th class="wd-15p border-bottom-0">SDT</th>
                                    <th class="wd-25p border-bottom-0">Trạng thái</th>
                                    <th class="wd-25p border-bottom-0">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ncc as $ncc)
                                <tr>
                                    <td><a>{{ $ncc->id }}</a></td>
                                    <td><a>{{ $ncc->TenNhaCungCap }}</a></td>
                                    <td><a>{{ $ncc->DiaChi }}</a></td>
                                    <td><a>{{ $ncc->SDT }}</a></td>
                                    <td>
                                        @if ($ncc->TrangThai==1)
                                            <div class="mt-sm-1 d-block">
                                                <span
                                                    class="badge bg-success-transparent rounded-pill text-success p-2 px-3">Hoạt động</span>
                                            </div>
                                            @endif
                                            @if ($ncc->TrangThai!=1)
                                            <div class="mt-sm-1 d-block">
                                                <span
                                                    class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">Dừng hoạt động</span>
                                            </div>
                                            @endif
                                    </td>
                                    <td>
                                        <a href="" type="button" class="btn btn-icon  btn-purple"><i class="fe fe-eye"></i></a>
                                        <a href="{{ route('NhaCungCap.edit',['NhaCungCap'=>$ncc->id]) }}"><button type="button" class="btn btn-icon  btn-success"><i class="fe fe-edit"></i></button></a>
                                        <a type="button">
                                            <form method="post" action="{{ route('NhaCungCap.destroy',['NhaCungCap'=>$ncc->id]) }}" enctype="multipart/form-data">
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