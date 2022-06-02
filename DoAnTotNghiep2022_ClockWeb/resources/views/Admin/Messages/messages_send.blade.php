@extends('Admin.App')

@section('content')
     <!-- CONTAINER -->
     <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Email-Compose</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Email-Compose</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="list-group list-group-transparent mb-0 mail-inbox pb-3">
                        <div class="mt-4 mb-4 mx-4 text-center">
                            <a href="{{ route('messages') }}" class="btn btn-primary btn-lg d-grid">Email</a>
                        </div>
                        <a href="email-inbox.html" class="list-group-item d-flex align-items-center active mx-4">
                            <span class="icons"><i class="ri-mail-line"></i></span> Inbox <span class="ms-auto badge bg-secondary bradius">14</span>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center mx-4">
                            <span class="icons"><i class="ri-mail-open-line"></i></span> Drafts
                        </a>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center mx-4">
                            <span class="icons"><i class="ri-star-line"></i></span> Starred <span class="ms-auto badge bg-success bradius">03</span>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center mx-4">
                            <span class="icons"><i class="ri-price-tag-3-line"></i></span> Tags
                        </a>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center mx-4">
                            <span class="icons"><i class="ri-mail-send-line"></i></span> Sent Mail
                        </a>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center mx-4">
                            <span class="icons"><i class="ri-delete-bin-line"></i></span> Trash
                        </a>
                    </div>
                    <div class="card-body border-top p-0 py-3">
                        <div class="list-group list-group-transparent mb-0 mail-inbox mx-4">
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                <span class="w-3 h-3 brround bg-primary me-2"></span> Friends
                            </a>
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                <span class="w-3 h-3 brround bg-secondary me-2"></span> Family
                            </a>
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                <span class="w-3 h-3 brround bg-success me-2"></span> Social
                            </a>
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                <span class="w-3 h-3 brround bg-info me-2"></span> Office
                            </a>
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                <span class="w-3 h-3 brround bg-warning me-2"></span> Work
                            </a>
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                <span class="w-3 h-3 brround bg-danger me-2"></span> Settings
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Compose new message</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-xl-2 form-label">To</label>
                                    <div class="col-xl-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-xl-2 form-label">CC</label>
                                    <div class="col-xl-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-xl-2 form-label">BC</label>
                                    <div class="col-xl-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-xl-2 form-label">Subject</label>
                                    <div class="col-xl-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <label class="col-xl-2 form-label">Message</label>
                                    <div class="col-xl-10">
                                        <textarea rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer d-sm-flex">
                        <div class="mt-2 mb-2">
                            <a href="javascript:void(0)" class="btn btn-icon btn-white btn-svg" data-bs-toggle="tooltip" title="" data-bs-original-title="Attach"><span class="ri-attachment-2"></span></a>
                            <a href="javascript:void(0)" class="btn btn-icon btn-white btn-svg" data-bs-toggle="tooltip" title="" data-bs-original-title="Link"><span class="ri-link"></span></a>
                            <a href="javascript:void(0)" class="btn btn-icon btn-white btn-svg" data-bs-toggle="tooltip" title="" data-bs-original-title="Photos"><span class="ri-image-line"></span></a>
                            <a href="javascript:void(0)" class="btn btn-icon btn-white btn-svg" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete"><span class="ri-delete-bin-line"></span></a>
                        </div>
                        <div class="btn-list ms-auto my-auto">
                            <button class="btn btn-danger btn-space mb-0">Cancel</button>
                            <button class="btn btn-primary btn-space mb-0">Send message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection