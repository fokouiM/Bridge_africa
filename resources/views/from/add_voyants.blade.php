@extends('layouts.app_admin')

@section('content_admin')

    <div class="content flex-column-fluid" id="kt_content">
        @if (isset($_GET['v2']))
            <div class="alert alert-custom alert-success fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">{{$_GET['v2']}}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
        @endif
        <!--begin::Card-->
        <div class="card card-custom card-transparent">
            <div class="card-body p-0">
                <!--begin::Wizard-->
                <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="true">
                    <!--begin::Card-->
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-10">
                                    <!--begin::Wizard Form-->
                                    <form class="form" method="POST" action="save_tag" >
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">
                                                <!--begin::Wizard Step 1-->
                                                <div class="my-5 step" data-wizard-type="step-content"
                                                    data-wizard-state="current">
                                                    <h5 class="text-dark font-weight-bold mb-10"> Detail du voyant:
                                                    </h5>
                                                    <!--begin::Group-->
                                                    <div class="form-group ">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"> ajouter un tag pour un voyant</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg is-invalid" name="name" type="text" required>
                                                            <div class="fv-plugins-message-container">
                                                                <div data-field="firstname" data-validator="notEmpty"
                                                                    class="fv-help-block"> le tag est obligatoire </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group-->
                                                    <div class="form-group ">
                                                        <button type="submit"class="btn btn-success" style="float: right">Enregister</button>
                                                    </div>
                                                    <!--end::Group-->
                                                </div>
                                                <!--end::Wizard Step 1-->
                                            </div>
                                        </div>
                                    </form>
                                    <!--end::Wizard Form-->
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Wizard-->
            </div>
        </div>
        <!--end::Card-->
    </div>

@endsection
