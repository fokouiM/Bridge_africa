<template>
    <!--begin::Content-->

        <div class="flex-row-fluid ml-lg-8 kt_chat_content" id="kt_chat_content">
            <!--begin::Card-->
            <div class="card card-custom" style=" height: 85vh">
                <!--begin::Header-->
                <!--end::Header-->

                <!--begin::Body-->
                <messagesFeed :contact="contact" :messages="messages"  />
                <!--end::Body-->

            </div>


            <!--end::Card-->
        </div>


    <!--end::Content-->
</template>
<script>
    import messageComposer from './messageComposer';
    import messagesFeed from './messagesFeed';

    export default {
        props:{
            contact:{
                type:Object,
                default: () => ({}),
            },
            messages:{
                type:Array,
                default: () => ([]),
            },
        },
        data(){
            return{
                selectedContact : null,
                contacts:[]
            };
        },
        methods:{
            sendMessage(text){
                console.log(text)
                if(!this.contact){
                    return;
                }
                axios.post('/conversation/send',{
                    id_user: this.contact.id,
                    name_voyant: this.contact.name_voyant,
                    statut: this.contact.statut,
                    statut_client: this.contact.statut_client,
                    name_user: this.contact.name_user,
                    text: text
                }).then((response) =>{
                    this.$emit('new',responce.data);
                })
            }
        },
        components : {messageComposer,messagesFeed}
    }
</script>
<style>
    .card-custom{
        background-image: url('../../../public/assets/media/bg/bg-chat.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

