@extends('layouts.app')

@section('content')
    <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="first" data-wizard-clickable="false" style="width: 100%;">
        <!--begin::Wizard Body-->
        <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
            <div class="col-xl-12 col-xxl-7">
                @if (isset($_GET['v2']))
                    <div class="alert alert-custom alert-notice alert-light-success fade show mb-5" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                        <div class="alert-text">{{$_GET['v2']}}</div>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                            </button>
                        </div>
                    </div>
                @endif
                <!--begin::Wizard Form-->
                <form class="form " method="POST" action="sendContact" >
                    @csrf
                    <!--begin::Wizard Step 1-->
                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                        <h3 class="mb-10 font-weight-bold text-dark">Entre vos information</h3>
                        <!--begin::Input-->
                        <div class="form-group fv-plugins-icon-container">
                            <label>Nom prenom</label>
                            <input type="text" class="form-control form-control-solid form-control-lg" name="name" placeholder="Nom prenom" required>
                            <span class="form-text text-muted">Nom prenom.</span>
                        <div class="fv-plugins-message-container"></div></div>
                        <!--end::Input-->

                        <!--begin::Input-->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-solid form-control-lg" name="email" placeholder="Email" required>
                            <span class="form-text text-muted">Email.</span>
                        </div>
                        <div class="form-group">
                            <label>Objet</label>
                            <input type="text" class="form-control form-control-solid form-control-lg" name="objet" placeholder="Obejet" required>
                            <span class="form-text text-muted">Obejet.</span>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <input type="text" class="form-control form-control-solid form-control-lg" name="message" placeholder="Message" required>
                            <span class="form-text text-muted">Message.</span>
                        </div>
                        <!--end::Input-->
                    </div>
                    <!--end::Wizard Step 1-->



                    <!--begin::Wizard Actions-->
                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                            <button type="submit" class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" >
                                Envoyer
                            </button>
                    </div>
                    <!--end::Wizard Actions-->
                <div></div><div></div><div></div><div></div></form>
                <!--end::Wizard Form-->
            </div>
        </div>
        <!--end::Wizard Body-->
    </div>
@endsection
