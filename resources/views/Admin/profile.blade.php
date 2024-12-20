l
@extends('layouts.app_admin')

@section('content_admin')

    <div class="content flex-column-fluid" id="kt_content">
        <!--begin::Profile Personal Information-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                <!--begin::Profile Card-->
                <div class="card card-stretch">
                    <!--begin::Body-->
                    <div class="card-body pt-4">
                        <!--begin::Toolbar-->
                        <!--end::Toolbar-->

                        <!--begin::User-->
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                <div class="symbol-label" style="background-image:url('assets/media/users/blank.png')">
                                </div>
                                <i class="symbol-badge bg-success"></i>
                            </div>
                            <div>
                                <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                                    {{ Auth::user()->name }}
                                </a>
                            </div>
                        </div>
                        <!--end::User-->

                        <!--begin::Contact-->
                        <div class="py-9">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Email:</span>
                                <a href="#" class="text-muted text-hover-primary">{{ Auth::user()->email }}</a>
                            </div>
                        </div>
                        <div class="py-9">
                            @if (isset( $_GET["v2"] ))
                            <p style="padding: 10px; background: #00f958"> {{$_GET["v2"]}}</p>
                            @endif
                        </div>
                        <!--end::Contact-->

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Profile Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Card-->
                <div class="card card-stretch">
                    <!--begin::Header-->
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Information Personal</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Mettre a jour vos informaitons personal</span>
                        </div>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Form-->
                <form class="form" method="POST" action="up_profile{{Auth::user()->id}}" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="font-weight-bold mb-6">Customer Info</h5>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="la la-at"></i></span></div>
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            value="{{ Auth::user()->email }}" name="email"placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            placeholder="{{ Auth::user()->name }}" name="name" value="{{ Auth::user()->name }}">
                                        <div class="input-group-append"><span class="input-group-text">name</span></div>
                                    </div>
                                </div>
                            </div>
                                <div class="card-toolbar" style="float: right">
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                    <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                        </div>
                        <!--end::Body-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Profile Personal Information-->
    </div>

@endsection
