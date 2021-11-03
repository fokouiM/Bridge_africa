<template>
  <div class="containt">
    <div class="content flex-column-fluid" id="kt_content" style="width: 100%; padding: 0;">
      <span v-if="messages.v2">
        <div class="alert alert-custom alert-success fade show" role="alert">
          <div class="alert-icon"><i class="flaticon-warning"></i></div>
          <div class="alert-text">{{ messages.v2 }}</div>
          <div class="alert-close">
            <button
              type="button"
              class="close"
              data-dismiss="alert"
              aria-label="Close"
            >
              <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
          </div>
        </div>
      </span>

      <!--begin::Chat-->
      <div class="d-flex flex-row">
        <!--begin::Content-->

        <div class="flex-row-fluid" id="kt_chat_content">
          <!--begin::Card-->
          <div class="card card-custom" style="    height: 70vh;">
            <!--begin::Header-->
            <div class="card-header align-items-center px-4 py-3">
                <credit />
              <div class="text-center flex-grow-1">
                <div class="text-dark-75 font-weight-bold font-size-h5">
                  <strong>{{ messages.name_voyant }} </strong>
                </div>
                <div>
                  <span class="label label-sm label-dot label-success"></span>
                </div>
              </div>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body" style="background: whitesmoke; overflow: auto;">
              <!--begin::Scroll-->
              <div
                class=" scroll-pull ps--active-y"
                data-mobile-height="350"

              >
                <!--begin::Messages-->
                <div class="messages messagew" >
                  <!--begin::Message welcom-->
                  <div class="d-flex flex-column  align-items-start">
                    <div
                      class="mt-2 rounded p-5 font-weight-bold text-left"
                      style="background: antiquewhite; color: #6c6b6bf2"
                    >
                      Bonjour {{ messages.user.name }} et merci pour votre
                      inscription. Déjà vous devez savoir que vous ne payez pas
                      du temps sur le site mais des crédits. Ainsi, 1 message
                      que vous envoyez est égal à 1 crédit, alors nous vous
                      proposons une voyance exclusive à partir de
                      <strong>1.25€(toutes taxes comprises pour une voyance de qualité profesionnel ). </strong> Vous
                      pouvez donc oublier les voyances hors de prix.Sur
                      <strong>voyance-auracle.fr</strong> nous vous révélons votre avenir et les
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
                          {{ message.message }}<br />
                          <!-- <span> {{ moment(message.created_at).format("DD/MM/YYYY") }} </span> -->
                          <!-- <span class="text-muted font-size-sm">{{message.created_at}}</span> -->
                        </div>
                      </div>
                    </span>
                    <!--end::Message In-->
                  </div>
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

                          {{ nextmessage }}<br />
                        </div>
                      </div>

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
            method="post"
            action="conversation/senduser"
          >
            <div
              class="card-footer align-items-center"
              style="display: flex; padding: 10px"
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
                  @keydown.enter="send"
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
    import credit from './credit';

export default {
  props: {
    messages: {
      type: Array,
      require: true,
    },
    nextmessage: {
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
  mounted() {


      axios.get("/conversationuerssi").then((response) => {
          this.messages = response.data;
    })

  },
  data(messages ){
        return{
            text:'',
            id_user : messages.user,
            name_voyant : messages.name_voyant,
            to : messages.to

        }
    },

  methods:{

        checkForm(e) {
            e.preventDefault();
            axios.post('/conversation/senduser',{
                text: this.text,
                id_user: this.messages.user.id,
                name_voyant: this.messages.name_voyant,
                to: 2,
            }).then((response) => {
                this.messages = response.data;
                this.nextmessage = '';
            });
            if(this.text == ''){
                return;
            }
            this.$emit('send', this.text)
            this.text = '';


        },
        saveNewMessage(text){
                this.messages.push(text);
            },
        scrollToBottom(){
            setTimeout(()=>{

                this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
            },50);
        },
        hanleIncoming(message){

                    this.messages.push(message);
                    this.saveNewMessage(message);

                alert(message.message);
            }
    },

    watch:{
        messages(messages){
            this.scrollToBottom();
        }
    },
        components : {credit},



};
</script>
<style >
    .messagew{
        max-height: 41vh;
    }
    .new-style{
     font-size: 0.9em !important;
    max-width: 80% !important;
    width: auto;
    text-align: left !important;
 }

</style>
