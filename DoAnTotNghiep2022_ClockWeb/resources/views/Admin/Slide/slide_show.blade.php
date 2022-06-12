@extends('Admin.App')

@section('content')
      <!-- CONTAINER -->
      <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Chi tiết slide</h1>
        </div>
        <!-- PAGE-HEADER END -->

        <!--Row -->
        <div class="row">
            <div class="col-md-12 col-xl-12">
                @foreach ($show as $show)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Chi tiết slide</h3>
                    </div>
                    <div class="card-body">
                        <a href="">
                            <img class="img-responsive br-5" src="{{ $show->Anh }}" width="50%" height="50%">
                        </a>
                        <h1></h1>
                        <div class="form-group ">
                            <label class="form-label">Tên slide</label>
                            <input type="text" class="form-control" value="{{ $show->TenSlide }}">
                        </div>
                        <div class="form-group ">
                            <label class="form-label">Mô tả</label>
                            <input type="text" class="form-control" value="{{ $show->Mota }}">
                        </div>
                        <div class="form-group ">
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control" value="{{ $show->Link }}">
                        </div>
                        <div class="form-footer mt-2">
                            <a href="{{ route('Slide.index') }}" class="btn btn-primary">Thoát</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!--End Row-->

    </div>
    <!-- CONTAINER CLOSED -->

@endsection