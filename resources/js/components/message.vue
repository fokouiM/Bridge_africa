<template>
<div class="containt">

   <div class="content flex-column-fluid" id="kt_content" style=" width: 100%;">
        <div class="alert alert-custom alert-success fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">message</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>

        <!--begin::Chat-->
        <div class="d-flex flex-row">

            <!--begin::Content-->

            <div class="flex-row-fluid " id="kt_chat_content">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Header-->
                    <div class="card-header align-items-center px-4 py-3">
                        <div class="text-center flex-grow-1">
                            <div class="text-dark-75 font-weight-bold font-size-h5"><strong>name_agent</strong></div>
                            <contactslist :contacts="contact" />
                            <div>
                                <span class="label label-sm label-dot label-success"></span>
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
                                        Bonjour <!--{{Auth::user()->name}} -->et merci pour votre inscription. Déjà vous devez savoir que vous ne payez pas du temps sur le site mais des crédits. Ainsi, 1 message que vous envoyez est égal à 1 crédit, alors nous vous proposons une voyance exclusive à partir de <strong>0,80€(moins chère qu'un Sms). </strong>  Vous pouvez donc oublier les voyances hors de prix.Sur voyance-auracle.fr nous vous révélons votre avenir et les solutions pour contourner les obstacles à votre bonheur, et pour se faire, Vous avez d'ores et déjà <strong>3 crédits offerts,</strong>  en quoi puis je vous aider ?
                                    </div>
                                </div>
                                <!--end::Message welcom-->

                                <!--begin::Message In-->
                                <conversation :messages="messages" />
                                    <div class="d-flex flex-column mb-5 align-items-start">
                                        <div class="d-flex align-items-center">
                                        </div>
                                        <div class="mt-2 rounded bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px" style="padding: 5px 10px 5px 10px;">
                                            message <br><span class="text-muted font-size-sm " style="font-size: 10px;">date</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column mb-5 align-items-end">
                                        <div class="d-flex align-items-center">
                                        </div>
                                        <div class="mt-2 rounded bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px" style="padding: 5px 10px 5px 10px;">
                                            message <br><span class="text-muted font-size-sm" style="font-size: 10px;">date</span>
                                        </div>
                                    </div>

                            </div>
                            <!--end::Messages-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Body-->

                    <!--begin::Footer-->
                    <form action="save_message" method="POST" id="message_form">

                        <!-- @csrf -->
                        <div class="card-footer align-items-center" style="display: flex; padding: 10px;">
                            <!--begin::Compose-->
                            <div class="d-flex align-items-center justify-content-between mt-5" style="width: 100%;">
                                <input type="text" name="message" id="message_input" required class="form-control"  placeholder="Texte" style="width: 90%;">
                                <div>
                                    <input type="hidden" name="id_user" value="id_user ">
                                    <input type="hidden" name="username" id="username" value="name_user ">
                                    <input type="hidden" name="name_voyant" value="name_agnet">
                                <button type="submit" id="message_send" class="btn btn-primary btn-md text-uppercase font-weight-bold  py-2 px-6">Envoyer</button>
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
</div>
</template>

<script>
    export default {
        data(){
            return{
                messages:[],
                contacts:[]
            };
        },
        mounted() {
            axios.get('/contacts')
                .then((response) =>{
                    this.contacts = response.data;
                })
        }
    }
</script>
