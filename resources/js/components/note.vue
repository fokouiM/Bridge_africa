<template>
        <div>
            <div class="card-body note">
                <!--begin::Scroll-->
                <div class="scroll scroll-pull ps ps--active-y" data-mobile-height="350"
                    style="height: 295px; overflow: hidden;">
                    <!--begin::Messages-->
                    <div v-if="contact">
                        <div v-for="note in messages.note" :key="note.id">
                            <div class="messages">
                                <!--begin::Message In-->
                                <div class="d-flex flex-column mb-5 align-items-start">
                                    <div class="d-flex align-items-center">
                                    </div>
                                    <div class="mt-2 rounded p-5 text-dark-50 font-weight-bold font-size-lg text-left max-w-400px bg-light-success" >
                                        {{note.note}}<br>
                                        <!-- <span class="text-muted font-size-sm">{{message.created_at}}</span> -->
                                    </div>
                                </div>
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
            <div class="card-footer align-items-center" style="display: flex; padding: 10px; margin-left: 10px;">
            <form id="app" @submit.prevent="checkForm" action="conversation/send" method="post" class="flex" >
                <!--begin::Compose-->
                <textarea id="message" v-model="text"   class="form-control border-0 p-0" required  placeholder="Message......"></textarea>
                <div class="d-flex align-items-center justify-content-between mt-5">
                    <div>
                        <button type="button" class="btn btn-primary ">Enregistré</button>
                    </div>
                </div>
                </form>
                <!--begin::Compose-->
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
            type:Object,
            require: true
        },
        note:{
            type:Array,
            require: true
        }
    },
    data(){
        return{
            text:'',
            id_user : message.user.id,

        }
    },
    methods:{

        checkForm(e) {
            // e.preventDefault();
            axios.post('/conversation/send',{
                text: this.text,
                id_user: this.id_user,
            })
            console.log(this.id_user)

        //     if(this.message ==''){
        //         return;
        //     }

        //     this.$emit('send', this.message);
        //     this.message = '';
        // }

        },
    },
    }
</script>
<style>
.note{

    background: #fff;
   margin-left: 10px;
   height: 68vh;
}
</style>

