@extends('layouts.app')

@section('content')

    <div class="content flex-column-fluid" id="kt_content">
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
                                    <form class="form" method="POST" action="save_update_produit{{$Produits->id}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">
                                                <!--begin::Wizard Step 1-->
                                                <div class="my-5 step" data-wizard-type="step-content"
                                                    data-wizard-state="current">
                                                    <h5 class="text-dark font-weight-bold mb-10">produits Details:
                                                    </h5>
                                                    <!--begin::Group-->
                                                    <div class="form-group ">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">Avatar</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="image-input image-input-outline"
                                                                id="kt_user_add_avatar">
                                                                <div class="image-input-wrapper" style="background-image: url(assets/media/users/logo-default.png)">
                                                                </div>

                                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="file" accept=".png, .jpg, .jpeg">
                                                                    <input type="hidden" name="profile_avatar_remove">
                                                                </label>
                                                                <div class="fv-plugins-message-container">
                                                                    <div data-field="lastname" data-validator="notEmpty"
                                                                        class="fv-help-block">Avatar is required</div>
                                                                </div>

                                                                <span
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="cancel" data-toggle="tooltip" title=""
                                                                    data-original-title="Cancel avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group-->
                                                    <div class="form-group ">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"> Name</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg is-invalid"
                                                                name="name" type="text" value="{{$Produits->name}}" >
                                                            <div class="fv-plugins-message-container">
                                                                <div data-field="firstname" data-validator="notEmpty"
                                                                    class="fv-help-block"> Name is required</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group-->
                                                    <div class="form-group ">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">description</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg is-invalid"
                                                                name="description" type="text" value=" {{$Produits->description}} " >
                                                            <div class="fv-plugins-message-container">
                                                                <div data-field="lastname" data-validator="notEmpty"
                                                                    class="fv-help-block">description is required</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group-->
                                                    <div class="form-group ">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">price</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="input-group input-group-solid input-group-lg">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-euro-sign"></i></span></div>
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" value=" {{$Produits->prix}} "   name="prix">
                                                                    <div class="input-group-append"><span class="input-group-text">XAF</span></div>
                                                            </div>
                                                            <div class="fv-plugins-message-container">
                                                                <div data-field="lastname" data-validator="notEmpty"class="fv-help-block">price is required</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="hidden" name="save" value="save">
                                                        <button type="submit"class="btn btn-success" style="float: right">Save</button>
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
