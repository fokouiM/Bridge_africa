<template>
<div class="containt">

   <div class="d-flex flex-row flex-column-fluid ">

        <!--begin::Content Wrapper-->
        <div class="main d-flex flex-column flex-row-fluid">

            <div class=" flex-column-fluid " id="kt_content" style="padding:10px;" >
                <!--begin::Chat-->
                <div class="d-flex flex-row">
                    <!--begin::Aside-->

                    <contactslist :contacts="contacts" @selected="startconversationWith"  />
                    <conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
                    <note :contact="selectedContact" :messages="messages" />
                    <!--end::Aside-->

                </div>
                <!--end::Chat-->
            </div>
            <!--end::Content-->
        </div>
        <!--begin::Content Wrapper-->
    </div>
</div>
</template>

<script>
    import contactslist from './contactslist';
    import conversation from './conversation';
    import note from './note';


    export default {
        data(){
            return{
                selectedContact : null,
                messages:[],
                contacts:[]
            };
        },
        mounted() {
            axios.get('/contacts')
                .then((response) =>{
                    this.contacts = response.data;
                });
        },
        methods:{
            startconversationWith(contact) {
                axios.get(`/conversation/${contact.id}/${contact.name_voyant}`)
                .then((response) =>{
                    this.messages = response.data;
                    this.selectedContact = contact;
                });
            },
            saveNewMessage(text){
                this.messages.push(text);
            }
        },
        components : {contactslist,conversation,note}
    }
</script>
