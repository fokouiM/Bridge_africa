@extends('layouts.app')

@section('content')
    <div class="content flex-column-fluid" id="kt_content" style=" width: 100%;">
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
                            style="height: 295px; overflow: hidden;">
                            <!--begin::Messages-->
                            <div class="messages">

                                <!--begin::Message welcom-->
                                <div class="d-flex flex-column mb-5 align-items-start">
                                    <div
                                        class="mt-2 rounded p-5 font-weight-bold  text-left max-w-800px " style="background-color: #01e303d4; color: #fff;">
                                        Bonjour {{Auth::user()->name}} et merci pour votre inscription. Déjà vous devez savoir que vous ne payez pas du temps sur le site mais des crédits. Ainsi, 1 message que vous envoyez est égal à 1 crédit, alors nous vous proposons une voyance exclusive à partir de <strong>0,80€(moins chère qu'un Sms). </strong>  Vous pouvez donc oublier les voyances hors de prix.Sur voyance-auracle.fr nous vous révélons votre avenir et les solutions pour contourner les obstacles à votre bonheur, et pour se faire, Vous avez d'ores et déjà <strong>3 crédits offerts,</strong>  en quoi puis je vous aider ?
                                    </div>
                                </div>
                                <!--end::Message welcom-->

                                <!--begin::Message In-->
                                @foreach ($message as $ms)
                                    @if ($ms->id_user == Auth::user()->name )
                                    <div class="d-flex flex-column mb-5 align-items-start">
                                        <div class="d-flex align-items-center">
                                        </div>
                                        <div class="mt-2 rounded bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px" style="padding: 5px 10px 5px 10px;">
                                            {{$ms->message}} <br><span class="text-muted font-size-sm " style="font-size: 10px;">{{$ms->created_at}}</span>
                                        </div>
                                    </div>
                                    @else
                                    <div class="d-flex flex-column mb-5 align-items-end">
                                        <div class="d-flex align-items-center">
                                        </div>
                                        <div class="mt-2 rounded bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px" style="padding: 5px 10px 5px 10px;">
                                            {{$ms->message}} <br><span class="text-muted font-size-sm" style="font-size: 10px;">{{$ms->created_at}}</span>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach

                            </div>
                            <!--end::Messages-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Body-->

                    <!--begin::Footer-->
                    <form action="save_message" method="POST">
                        @csrf
                        <div class="card-footer align-items-center" style="display: flex; padding: 10px;">
                            <!--begin::Compose-->
                            <div class="d-flex align-items-center justify-content-between mt-5" style="width: 100%;">
                                <input type="text" name="message" required class="form-control"  placeholder="Texte" style="width: 90%;">
                                <div>
                                    <input type="hidden" name="id_user" value="{{Auth::user()->id}} ">
                                    <input type="hidden" name="name_voyant" value="{{$name_agent}}">
                                <button type="submit" class="btn btn-primary btn-md text-uppercase font-weight-bold  py-2 px-6">Envoyer</button>
                                </div>
                            </div>
                            <!--begin::Compose-->
                        </div>
                    </form>
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Chat-->
    </div>
@endsection
