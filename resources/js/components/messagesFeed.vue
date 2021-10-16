<template>
    <div>
            <div class="card-header align-items-center px-4 py-3">
                <div class="text-left flex-grow-1">
                    <!--begin::Aside Mobile Toggle-->
                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none"
                        id="kt_app_chat_toggle">
                        <span class="svg-icon svg-icon-lg">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Adress-book2.svg--><svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                        d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z"
                                        fill="#000000" opacity="0.3"></path>
                                    <path
                                        d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span> </button>
                    <!--end::Aside Mobile Toggle-->

                </div>
                <div class="text-center flex-grow-1">
                    <div class="text-dark-75 font-weight-bold font-size-h5"> <strong>{{messages.user.name}}</strong> | <strong>{{messages.user.affaire}}.€</strong> | credit : <strong>{{messages.user.credit}}</strong> </div>
                    <div class="flex" id="allMessage">
                        <div v-for="voyants in messages.voyants" :key="voyants.id" >
                            <button  class="btn btn-light-primary btn-sm font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title=""
                                data-placement="left" data-original-title="liste voyant" v-on:click=" Active = voyants.name_voyant"
                                >
                                <span class="opacity-60 font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">{{voyants.name_voyant}} </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="height:68vh;">
                <!--begin::Scroll-->
                <div id="scroll" class="scroll scroll-pull ps--active-y" data-mobile-height="350"
                    style="height: 295px; overflow: auto; overflow-x: hidden; " >
                    <!--begin::Messages-->
                    <div v-if="contact">
                        <div v-for="message in messages.message" :key="message.id">
                            <div class="messages">
                                <!--begin::Message In-->
                                    <span v-if="message.name_voyant == Active">
                                        <span v-if="message.id_send == contact.id">
                                            <div class="d-flex flex-column mb-1 align-items-start">
                                                    <div class="mt-2 rounded p-2 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px " style="font-size:0.9em; " >
                                                        {{message.message}}<br>
                                                        <!-- <span class="text-muted font-size-sm">{{message.created_at}}</span> -->
                                                    </div>
                                            </div>
                                        </span>
                                        <span v-else>
                                            <div class="d-flex flex-column mb-1 align-items-end">
                                                <div class="mt-2 rounded p-2 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px" style="font-size:0.9em; ">
                                                    {{message.message}}
                                                </div>
                                            </div>
                                        </span>
                                    </span>
                                <!--end::Message In-->
                            </div>
                        </div>
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
            <div class="card-footer align-items-center" style="display: flex; padding: 10px;" ref="feed">
            <!-- <div>{{message.user.name}}</div> -->
            <form id="app" @submit="checkForm" action="conversation/send" method="post" class="flex" >
                <div class="d-flex align-items-center justify-content-between mt-5">
                    <div>
                        <button type="button" class="btn btn-primary ">Reponce</button>
                    </div>
                </div>
                <textarea id="message" v-model="text"  class="form-control border-0 p-0" required  placeholder="Message......"></textarea>

                <div class="d-flex align-items-center justify-content-between mt-5">
                    <div>
                        <button type="submit" class="btn btn-primary ">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</template>
<script>

export default {

        props:{
            contact:{
                type:Object
            },
            messages:{
                type:Array,
                require: true
            },
            user:{
                type:Object,
                require: true
            },
            voyants:{
                type:Array,
                require: true
            },
            note:{
                type:Array,
                require: true
            },
            Active:{
                type:Object,
                require: true
            }

        },

        data(messages ){
        return{
            text:'',
            id_user : messages.user,
            name_voyant : Active,

        }
    },
    methods:{

        checkForm(e) {
            e.preventDefault();
            axios.post('/conversation/send',{
                text: this.text,
                id_user: this.messages.user.id,
                name_voyant: this.Active
            }).then((response) => {
                this.messages = response.data;
                this.selectedContact = contact;
            }),
            axios.get('/contacts')
                .then((response) =>{
                    this.contacts = response.data;
                });


        },
        scrollToBottom(){
            setTimeout(()=>{

                this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
            },50);
        }
    },

    watch:{
        user(user){
            this.scrollToBottom();
        },
        contact(contact){
            this.scrollToBottom();
        },
        messages(messages){
            this.scrollToBottom();
        }
    }
    }
</script>
<style>
    ::-webkit-scrollbar {
    width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: #555;
    }
    .flex{
        display: flex;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
    }
</style>

