<template>
  <div class="containt">
    <div class="content flex-column-fluid" id="kt_content" style="width: 100%; padding: 0; background: #000824;">
      <span v-if="messages.v2">
        <div class="anime">
            <div class="alert alert-custom alert-notice alert-light-success fade show mb-5" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text"> {{ messages.v2 }} <a href="pack">cliquer icI</a> pour recharger votre compte</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
        </div>
      </span>

      <!--begin::Chat-->
      <div class="d-flex flex-row user-chat-content">
        <!--begin::Content-->

        <div class="flex-row-fluid" id="kt_chat_content">
          <!--begin::Card-->
          <div class="card card-custom" style="height: 78vh;">
            <!--begin::Header-->
            <div class="flex justify-between w-full align-items-center px-4 py-3" style="width: 100%;">
                <div class="tex-credit">
                    <a href="pack" class="btn btn-light-primary font-weight-bold btn-sm px-5 font-size-base ml-2"> Credit : {{credit}} </a>
                </div>
              <div class="text-center flex-grow-1">
                <div class="text-dark-75 font-weight-bold font-size-h5">
                  <strong>{{ name_voyant }} </strong>
                </div>
                <div>
                  <span class="label label-sm label-dot label-success"></span>
                </div>
              </div>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div ref="cardBody" class="card-body body-user-chat" style=" overflow: auto;">
              <!--begin::Scroll-->
              <div
                class=" scroll-pull ps--active-y"

              >
                <!--begin::Messages-->
                  <!--begin::Message welcom-->
                  <div v-if="messages && messages.message && (messages.message.length < 1 || messages.message.length == 0)" class="d-flex flex-column align-items-start">
                    <div
                      class="mt-2 rounded p-5 font-weight-bold text-left"
                      style="background: #8950FC; color: #fff"
                    >
                      Bonjour {{ messages.user.name }} et merci pour votre
                      inscription. Déjà vous devez savoir que vous ne payez pas
                      du temps sur le site mais des crédits. Ainsi, 1 message
                      que vous envoyez est égal à 1 crédit, alors nous vous
                      proposons une voyance exclusive à partir de
                      <strong>1.25€(toutes taxes comprises pour une voyance de qualité profesionnel ). </strong> Vous
                      pouvez donc oublier les voyances hors de prix.Sur
                      <strong>unevoyante-fr.fr</strong> nous vous révélons votre avenir et les
                      solutions pour contourner les obstacles à votre bonheur,
                      et pour se faire, Vous avez d'ores et déjà
                      <strong>3 crédits offerts,</strong> en quoi puis je vous
                      aider ?
                    </div>
                  </div>
                  <!--end::Message welcom-->

                  <div v-for="message in messages.message" :key="message.id">
                    <!--begin::Message In-->
                    <span v-if="message.id_send == messages.user.id">
                      <div class="d-flex flex-column mb-1 align-items-end " >
                        <div
                          class=" new-style
                            mt-2
                            rounded
                            p-2
                            bg-light-primary
                            text-dark-50
                            font-weight-bold font-size-lg
                            text-right
                          "
                          style="font-size: 0.9em"
                        >
                          {{ message.message }}
                          <span class="text-muted font-size-sm" style="margin-left: 2em; float: right;">{{message.created_at}}</span>
                        </div>
                      </div>
                    </span>
                    <span v-else>
                      <div class="d-flex flex-column mb-1 align-items-start ">
                        <div
                          class=" new-style
                            mt-2
                            rounded
                            p-2
                            bg-light-success
                            text-dark-50
                            font-weight-bold font-size-lg
                            text-left
                          "
                          style="font-size: 0.9em"
                        >
                          {{ message.message }}
                          <span class="text-muted font-size-sm" style="margin-left: 2em; float: right;">{{message.created_at}}</span>
                        </div>
                      </div>
                    </span>
                    <!--end::Message In-->
                  </div>
              </div>
            </div>
            <!--end::Scroll-->
          </div>
          <!--end::Body-->

          <!--begin::Footer-->
          <form ref="feed"
            id="app"
            @submit="checkForm"
          >
            <div
              class="card-footer align-items-center"
              style="display: flex; padding: 10px; height: 10vh;"
            >
              <!--begin::Compose-->
              <div
                class="d-flex align-items-center justify-content-between mt-5"
                style="width: 100%"
              >
                <input
                  type="text"
                  v-model="text"
                  required
                  @keydown.enter="checkForm"
                  class="form-control"
                  placeholder="Texte"
                  style="width: 90%"
                />
                <div>
                  <button
                    type="submit"
                    id="message_send"
                    class="
                      btn btn-primary btn-md
                      text-uppercase
                      font-weight-bold
                      py-2
                      px-6
                    "
                  >
                    Envoyer
                  </button>
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
</template>

<script>
 import Swal from 'sweetalert2';
 import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

export default {
  props: {
    users: {
      type: Object,
      require: true,
    },
    name_voyants: {
      type: String,
      require: true,
      default: '',
    },
    v2: {
      type: Object,
      require: false,
      default: () => ({}),
    },
  },

  created(){
    this.credit = this.users.credit
    setTimeout(() => {
        this.initWebSocket()
        this.scrollToBottom()
    }, 2000);
  },
  mounted() {
    this.name_voyant = this.name_voyants
      axios.get(`/conversationuers/${this.name_voyants}`).then((response) => {
          this.messages = response.data;
          this.to = messages.to
          this.id_user = messages.user
          this.scrollToBottom()
    })



  },
  data(){
        return{
            text:'',
            id_user :"",
            name_voyant : "",
            messages : [],
            credit : 0,
            to : 0
        }
    },

  methods:{
        initWebSocket() {
            console.log("hunter debug id : ",this.users.id)
            // Pusher.logToConsole = true;
            window.Pusher = Pusher;

            window.Echo = new Pusher(process.env.MIX_PUSHER_APP_KEY,{
                broadcaster: 'pusher',
                key: process.env.MIX_PUSHER_APP_KEY,
                cluster: process.env.MIX_PUSHER_APP_CLUSTER,
                forceTLS: true,
                encrypted: true,
            });
            let channel = window.Echo.subscribe(`messages.${this.users.id}`);
            channel.bind("MessageSent", (data) => {
                try {
                const messageData = data.message; // Accédez directement à l'objet message
                console.log("Données du message :", messageData);

                this.messages.message.push(messageData); // Ajoutez le message à la liste
                this.nextmessage = messageData; // Stockez le message suivant
                setTimeout(() => {
                    this.scrollToBottom()
                }, 500);
            } catch (error) {
                console.error("Erreur lors du traitement de l'événement :", error);
            }
            });
        },

        checkForm(e) {
            e.preventDefault();
            if(this.text == ''){
                return;
            }else{
                axios.post('/conversation/senduser',{
                    text: this.text,
                    id_user: this.messages.user.id,
                    name_voyant: this.name_voyant,
                    to: 2,
                }).then((response) => {
                    if(response.data.message){
                        this.messages.message.push(response.data.message)
                        this.getcrefit()
                        setTimeout(() => {
                            this.scrollToBottom()
                        }, 500);
                    }
                    if(response.data.v2 && response.data.v2.includes("credit insuffisant")){
                        this.confirmpy(response.data.v2)
                    }
                    else if(response.data.v2){
                        this.showAlert(response.data.v2)
                    }
                });
                setTimeout(() => {
                    this.getcrefit()
                    this.scrollToBottom()
                    this.text = '';
                }, 1000);
            }


        },
        async confirmpy(msg) {
            const result = await Swal.fire({
            title: msg,
            text: "votre crédit est insuffisant pour continuer à envoyer des messages vous souhaitez acheter un pack ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, payer!',
            cancelButtonText: 'Annuler'
            });
            if (result.isConfirmed==true) {
                window.location.href = '/pack';
            }
        },
        showAlert(message){
            Swal.fire({
                title: 'Alerte!',
                text: message,
                icon: 'info',
                timer: 2000,
                confirmButtonText: 'OK'
            });
        },
        getcrefit(){
            axios.get("/getcredit").then((response) => {
                this.credit = response.data.user; })
        },
        scrollToBottom() {
            try {
                const scrollableBlock = this.$refs.cardBody;
                scrollableBlock.scrollTop = scrollableBlock.scrollHeight + 20;
            } catch (error) {
                setTimeout(() => {
                    const scrollableBlock = this.$refs.cardBody;
                    scrollableBlock.scrollTop = scrollableBlock.scrollHeight + 20;
                }, 20000);
            }
        },
    },
    };
</script>
<style scoped>
 .tex-credit{
     text-align: center;
    padding: 8px 0;
 }
 .body-user-chat{
    background-image: url('../../../public/assets/media/bg/bg-whatsapp.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
 }
 .user-chat-content{
    width: 50%;
    margin: auto;
 }
 @media (max-width: 768px) {
    .card-custom {
        height: 83vh !important;
    }
    .user-chat-content{
        width: 100%;
     }
  }
  @media (max-width: 480px) {
    .card-custom {
        height: 83vh !important;
    }
    .user-chat-content{
        width: 100%;
     }
  }
</style>
