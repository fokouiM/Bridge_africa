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
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Formulaire de poste</h3>
                </div>
                <div class="card-toolbar">
                </div>
            </div>
            <!--begin::Form-->
            <form style="padding: 0 10% 10px 10%;" method="POST" action="save_post" enctype="multipart/form-data"  >
                @csrf
                <div class="card-body">
                    <div class="form-group row" style="display:">
                        <div class="inline" style="width: 50%">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Icon</label>
                            <div class="col-lg-6 col-xl-6">
                                <div class="image-input" id="kt_image_2">
                                    <div class="image-input-wrapper" style="background-image: url(assets/media/users/default.jpg)"></div>

                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Changer l'icone">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" required name="icone" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="profile_avatar_remove"/>
                                    </label>

                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
                            </div>
                        </div>
                        <div class="inline" style="width: 50%">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">couverture</label>
                            <div class="col-lg-6 col-xl-6">
                                <div class="image-input image-input-outline" id="kt_image_1">
                                    <div class="image-input-wrapper" style="background-image: url(assets/media/users/default.jpg)"></div>

                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="profile_avatar_remove"/>
                                    </label>

                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-xl-3 col-lg-3 col-form-label"> Titre</label>
                    <div class="col-lg-9 col-xl-9">
                        <input class="form-control form-control-solid form-control-lg is-invalid" name="titre" type="text" value="" required>
                        <div class="fv-plugins-message-container">
                            <div data-field="firstname" data-validator="notEmpty"
                                class="fv-help-block"> Titre du poste </div>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-xl-3 col-lg-3 col-form-label"> description</label>
                    <div class="col-lg-9 col-xl-9">
                        <input
                            class="form-control form-control-solid form-control-lg is-invalid"
                            name="desc" type="text" value="" required>
                        <div class="fv-plugins-message-container">
                            <div data-field="firstname" data-validator="notEmpty"
                                class="fv-help-block"> description du poste </div>
                        </div>
                    </div>
                </div>
                <button type="submit"class="btn btn-success" style="float: right">Enregister</button>
            </form>
        </div>
        <!--end::Card-->
    </div>

@endsection
