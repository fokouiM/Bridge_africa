@extends('layouts.app')

@section('content')

    <div class="content flex-column-fluid" id="kt_content" style=" width: 100%;">
        <!--begin::Chat-->
        <div class="d-flex flex-row">

            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-12" id="kt_chat_content">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Header-->
                    <div class="card-header align-items-center px-4 py-3">
                        <div class="text-center flex-grow-1">
                            <div class="text-dark-75 font-weight-bold font-size-h5"><strong>{{$name_agent}}</strong></div>
                            <div>
                                <span class="label label-sm label-dot label-success"></span>
                                <span class="font-weight-bold text-muted font-size-sm">Active</span>
                            </div>
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Scroll-->
                        <div class="scroll scroll-pull ps ps--active-y" data-mobile-height="350"
                            style="height: 271px; overflow: hidden;">
                            <!--begin::Messages-->
                            <div class="messages">

                                <!--begin::Message welcom-->
                                <div class="d-flex flex-column mb-5 align-items-start">
                                    <div
                                        class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-800px ">
                                        Bonjour {{Auth::user()->name}} et merci pour votre inscription. Déjà vous devez savoir que vous ne payez pas du temps sur le site mais des crédits. Ainsi, 1 message que vous envoyez est égal à 1 crédit, alors nous vous proposons une voyance exclusive à partir de <strong>0,80€(moins chère qu'un Sms). </strong>  Vous pouvez donc oublier les voyances hors de prix.Sur voyance-auracle.fr nous vous révélons votre avenir et les solutions pour contourner les obstacles à votre bonheur, et pour se faire, Vous avez d'ores et déjà <strong>3 crédits offerts,</strong>  en quoi puis je vous aider ?
                                    </div>
                                </div>
                                <!--end::Message welcom-->

                                <!--begin::Message In-->
                                <div class="d-flex flex-column mb-5 align-items-start">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-40 mr-3">
                                            <img alt="Pic" src="assets/media/users/default.jpg">
                                        </div>
                                        <div>
                                            <a href="#"
                                                class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">{{$name_agent}}</a>
                                            <span class="text-muted font-size-sm">2 Heures</span>
                                        </div>
                                    </div>
                                    <div
                                        class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                        How likely are you to recommend our company
                                        to your friends and family?
                                    </div>
                                </div>
                                <!--end::Message In-->

                                <!--begin::Message Out-->
                                <div class="d-flex flex-column mb-5 align-items-end">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <span class="text-muted font-size-sm">3 minutes</span>
                                            <a href="#"
                                                class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">vous</a>
                                        </div>
                                        <div class="symbol symbol-circle symbol-40 ml-3">
                                            <img alt="Pic" src="assets/media/users/300_21.jpg">
                                        </div>
                                    </div>
                                    <div
                                        class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                        Hey there, we’re just writing to let you know
                                        that you’ve been subscribed to a repository on GitHub.
                                    </div>
                                </div>
                                <!--end::Message Out-->


                            </div>
                            <!--end::Messages-->
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; height: 271px; right: -2px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 75px;"></div>
                            </div>
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Body-->

                    <!--begin::Footer-->
                    <div class="card-footer align-items-center">
                        <!--begin::Compose-->
                        <textarea class="form-control border-0 p-0" rows="2" placeholder="Texte"></textarea>
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <div class="mr-3">
                                {{-- <a href="#" class="btn btn-clean btn-icon btn-md mr-1"><i
                                        class="flaticon2-photograph icon-lg"></i></a>
                                <a href="#" class="btn btn-clean btn-icon btn-md"><i
                                        class="flaticon2-photo-camera  icon-lg"></i></a> --}}
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Envoyer</button>
                            </div>
                        </div>
                        <!--begin::Compose-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Chat-->
    </div>
@endsection
