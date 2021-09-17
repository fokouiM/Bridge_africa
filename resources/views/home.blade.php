@extends('layouts.app')

@section('content')

        <div class="content flex-column-fluid" id="kt_content">

            <div class="row">
                @if (isset( $_GET["v2"] ))
                            <p style="padding: 10px; background: #00f958"> {{$_GET["v2"]}}</p>
                            @endif
            </div>
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                @foreach ($produits as $pd)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body text-center pt-4">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end">
                                <div class="dropdown dropdown-inline" data-toggle="tooltip"
                                    title="Quick actions" data-placement="left">
                                    <a href="#"
                                        class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover">
                                            <li class="navi-header font-weight-bold py-4">
                                                <span class="font-size-lg">actions:</span>
                                                <i class="flaticon2-information icon-md text-muted"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Click to learn more..."></i>
                                            </li>
                                            <li class="navi-separator mt-3 opacity-70"></li>
                                            <li class="navi-footer py-4">
                                                <form action="update{{$pd->id}}" method="get">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{$pd->id}}" name="id">
                                                    <button class="btn btn-clean font-weight-bold btn-sm"
                                                        type="submit">
                                                        <i class="la la-pen"></i>
                                                        update
                                                    </button>
                                                </form>
                                                <form action="delete{{$pd->id}}" method="GET">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{$pd->id}}" name="id">
                                                    <button class="btn btn-clean font-weight-bold btn-sm"
                                                        type="submit">
                                                        <i class="la la-trash-o"></i>
                                                        delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Toolbar-->

                            <!--begin::User-->
                            <div class="mt-7">
                                <div class="symbol symbol-circle symbol-lg-75">
                                    <img src="storage/assets/produits/{{$pd->file}}" alt="image" />
                                </div>
                                <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                    <span class="font-size-h3 font-weight-boldest">JB</span>
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Name-->
                            <div class="my-2">
                                <a href=""
                                    class="text-dark font-weight-bold text-hover-primary font-size-h4">{{$pd->name}}</a>
                            </div>
                            <!--end::Name-->

                            <!--begin::Label-->
                            <span
                        class="label label-inline label-lg label-light-warning btn-sm font-weight-bold">{{$pd->prix}} XAF</span>
                            <!--end::Label-->

                            <!--begin::Buttons-->
                            <div class="mt-9 mb-6">
                                <p> {{$pd->description}} </p>
                            </div>
                            <!--end::Buttons-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                @endforeach
                <!--end::Col-->
            </div>
            <!--end::Row-->

            {{-- <!--begin::Pagination-->
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap mr-3">
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                            class="ki ki-bold-double-arrow-back icon-xs"></i></a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                            class="ki ki-bold-arrow-back icon-xs"></i></a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">23</a>
                    <a href="#"
                        class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">24</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">25</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">26</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">27</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">28</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                            class="ki ki-bold-arrow-next icon-xs"></i></a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                            class="ki ki-bold-double-arrow-next icon-xs"></i></a>
                </div>
                <div class="d-flex align-items-center">
                    <select
                        class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary"
                        style="width: 75px;">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="text-muted">Displaying 10 of 230 records</span>
                </div>
            </div>
            <!--end::Pagination--> --}}
        </div>
@endsection
