@extends('layouts.app')

@section('content')
   <div class="content flex-column-fluid" id="kt_content" style=" width: 100%;">
        <!--begin::Row-->
        <div class="row">
            @foreach ( $blogs as $bg )
                <div class="col-xl-6">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-4 symbol symbol-65 symbol-circle">
                                    <img src="/storage/blog/{{$bg->profil}}" alt="image">
                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column mr-auto">
                                    <!--begin: Title-->
                                    <span class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">
                                        {{$bg->titel}}
                                    </span>
                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar mb-auto">
                                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title=""
                                        data-placement="left" data-original-title="{{$bg->created_at}}">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                    </div>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Content-->
                            @if ($bg->image == null)
                                <p class="mb-7 mt-3 non_img">
                                    {{$bg->description}}
                                </p>
                            @else
                            <!--begin::Text-->
                                <p class="mb-7 mt-3" style=" font-family: ui-serif;">
                                    {{$bg->description}}
                                </p>
                            <!--end::Text-->
                                <div class="d-flex flex-wrap mt-5">
                                    <img src="/storage/blog/{{$bg->image}}" height="auto"  width="100%" alt="" style="max-height: 300px;">
                                </div>
                            <!--end::Content-->
                            @endif
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
            @endforeach
        </div>
        <!--end::Row-->

   </div>

@endsection
