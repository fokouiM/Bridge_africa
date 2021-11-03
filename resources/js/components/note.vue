<template>
        <div>
            <div class="card-body note mobile ">
                <!--begin::Scroll-->
                <div class=" scroll-pull " data-mobile-height="350"
                    style="height: auto; ">
                    <!--begin::Messages-->
                    <div v-if="messages.note">
                        <div v-if="notess">
                            <div v-for="note in notess.note" :key="note.id">
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
                        <div v-else >
                            <div v-for="note in messages.note" :key="note.id" >
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
            <div class="card-footer align-items-center mobile" style="display: flex; padding: 10px; margin-left: 10px;">
            <form id="app" @submit="checkFormone" action="conversation/note" method="post" class="flex" >
                <input  v-model="note"   class="form-control messagesend" @keydown.enter="send" required  placeholder="Note client......">
                <div class="d-flex align-items-center justify-content-between ">
                    <div>
                        <button type="submit" class="btn btn-primary ">Enregistré</button>
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
        notess:{
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
    data(messages){
        return{
            note:'',
            id_user : messages.user,

        }
    },
    methods:{

        checkFormone(e) {
            e.preventDefault();
            axios.post('/conversation/note',{
                note: this.note,
                id_user: this.messages.user.id,
            }).then((response) => {
                this.notess = response.data;
                this.selectedContact = contact;

            });
             if(this.note == ''){
                return;
            }
            this.$emit('send', this.note)
            this.note = '';


        },
    },
    }
</script>
<style>
.note{

    background: #fff;
   margin-left: 10px;
   height: 80vh;
overflow: auto;
}
@media screen and (max-width: 600px) {
    .mobile{
        display: none !important;
    }
}
</style>

