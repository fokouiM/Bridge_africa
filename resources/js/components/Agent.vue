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
                    <listenote :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
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
    import listenote from './listenote';


    export default {

        props: {
    messages: {
      type: Array,
      require: true,
    },
    users: {
      type: Object,
      require: true,
    },
    v2: {
      type: Object,
      require: true,
    },
    to: {
      type: Object,
      require: true,
    },
    nextmessage: {
        type: Array,
        require: true,
        },
    name_voyant: {
      type: Object,
      require: true,
    },
  },
  created(){
      Echo.channel(`messages${this.users.id}`)
            .listen('NewMessage',  (e) => {
                //  this.hanleIncoming(e.message);
            // this.message = e.message;
            this.nextmessage = e.message.message

        });
  },

        data(){
            return{
                selectedContact : null,
                messages:[],
                contacts:[]
            };
        },
        mounted() {
            setInterval(() => {

                axios.get('/contacts')
                    .then((response) =>{
                        this.contacts = response.data;
                    })
                    axios.get('/sanctum/csrf-cookie').then(response => {
                        this.user = response.data;
                    });
            }, 2000);
        },
        checkForm(e) {
            e.preventDefault();
            axios.post('/conversation/send',{
                text: this.text,
                id_user: this.messages.user.id,
                name_voyant: this.Active
            }).then((response) => {
                this.messages = response.data;
                this.selectedContact = contact;
            });
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
            },

            hanleIncoming(message){
                    this.messages.push(message);
                    this.saveNewMessage(message);
                alert(message.message);
            }
        },
        components : {contactslist,conversation,listenote}
    }
</script>
