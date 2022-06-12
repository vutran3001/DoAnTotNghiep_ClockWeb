@extends('Admin.App')

@section('content')
     <!-- CONTAINER -->
     <div class="main-container container-fluid">

        {{-- <h1></h1>
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
        @endif --}}
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Chỉnh sửa slide</h1>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
        @foreach ($slide as $slide)
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{ route('Slide.update',['Slide'=>$slide]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Tên slide :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name"  value="{{ $slide->TenSlide }}">
                                </div>
                            </div>
    
                            <!-- Row -->
                            <div class="row">
                                <label class="col-md-3 form-label mb-4">Mô tả :</label>
                                <div class="col-md-9 mb-4">
                                    <textarea class="content" name="mota" >{{ $slide->Mota }}</textarea>
                                </div>
                            </div>
                            <!--End Row-->
    
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Link :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="link" value="{{ $slide->Link }}">
                                </div>
                            </div>
    
                            <!--Row-->
                            <div class="row">
                                <label class="col-md-3 form-label mb-4">Ảnh :</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="file" name="anh">
                                </div>
                            </div>
                            <!--End Row-->

                            <div class="row">
                                <label class="col-md-3 form-label mb-4"></label>
                                <div id="lightgallery" class="col-md-9">
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0" data-responsive="{{ $slide->Anh }}" data-src="{{ $slide->Anh }}">
                                        <a href="">
                                            <img class="img-responsive br-5" src="{{ $slide->Anh }}" alt="Thumb-1">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
                        <div class="card-footer">
                            <!--Row-->
                            <div class="row">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </div>
                            <!--End Row-->
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        @endforeach
        <!-- /ROW-1 CLOSED -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection