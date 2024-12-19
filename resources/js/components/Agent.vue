<template>
<div class="containt">

   <div class="d-flex flex-row flex-column-fluid ">

        <!--begin::Content Wrapper-->
        <div class="main d-flex flex-column flex-row-fluid">

            <div class=" flex-column-fluid " id="kt_content" style="padding:10px;" >
                <!--begin::Chat-->
                <div class="d-flex flex-row">
                    <!--begin::Aside-->
                    <div :style="isMobile == false ? 'width: 20%;' : 'width: 0%;'">
                        <contactslist :contacts="contacts" @selected="startconversationWith"  />
                    </div>
                    <div :style="isMobile == false ? 'width: 60%;' : 'width: 100%;'">
                        <conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
                    </div>
                    <div :style="isMobile == false ? 'width: 20%;' : 'width: 0%;'">
                        <listenote :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
                    </div>
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
        users: {
        type: Object,
        require: true,
        },
    },
    created(){
        Echo.channel(`messages.${this.users.id}`)
            .listen('message:new',  (e) => {
            console.log("hunter debug : ",e)
            this.messages = e.message.message

        });
    },

    data(){
        return{
            selectedContact : null,
            messages:[],
            contacts:[],
            isMobile: false,
            Active : false
        };
    },
    created() {
        setInterval(() => {
            axios.get('/contacts')
            .then((response) =>{
                this.contacts = response.data;
            })

        }, 4000);
        axios.get('/sanctum/csrf-cookie').then(response => {
            this.user = response.data;
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
        updateContacts(newValue) {
            this.contacts = newValue; // Met à jour la donnée dans le parent
        },
        checkIfMobile() {
            this.isMobile = window.matchMedia("(max-width: 768px)").matches;
        }
    },
    mounted() {
        this.checkIfMobile(); // Vérification initiale

        // Ajoutez un écouteur pour les redimensionnements
        window.addEventListener("resize", this.checkIfMobile);
    },
    beforeDestroy() {
        // Supprimez l'écouteur pour éviter les fuites de mémoire
        window.removeEventListener("resize", this.checkIfMobile);
    },

        components : {contactslist,conversation,listenote}
    }
</script>
