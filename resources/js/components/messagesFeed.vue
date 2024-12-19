<template>
    <div>
            <div class="card-header align-items-center px-4 py-4" >
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
                <div v-if="messages.user">
                    <div class="text-center flex-grow-1">
                        <div class="text-dark-75 font-weight-bold font-size-h5"> <strong>{{messages.user.name}}</strong> | <strong>{{messages.user.affaire}}.€</strong> | credit : <strong>{{messages.user.credit}}</strong> </div>
                        <div class="flex" id="allMessage">
                                <div v-for="voyants in messages.voyants" :key="voyants.id" >
                                    <button  class="btn btn-light-primary btn-sm font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title=""
                                        data-placement="left" data-original-title="liste voyant" @click=" selectVoyant(voyants.name_voyant)"
                                        >
                                        <span class="opacity-60 font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">{{voyants.name_voyant}} </span>
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div ref="card_body" class="card-body" :style="isMobile==false ? 'height: 69vh;  overflow-x: auto;' : 'height: 67vh;  overflow-x: auto;'">
                <!--begin::Scroll-->
                <div id="scroll" class=" scroll-pull ps--active-y" data-mobile-height="350"
                    style="max-height: 58vh; height: auto;  " >
                    <!--begin::Messages-->
                    <div v-if="contact">
                            <div class="messages">
                                <div v-for="message in messages.message" :key="message.id">
                                <!--begin::Message In-->
                                    <span v-if="message.name_voyant == Active && message.name_voyant != null">
                                            <div class="d-flex flex-column mb-1 " :class="message.id_send == contact.id ? 'align-items-start' : 'align-items-end ' ">
                                                <div class="mt-2 rounded p-2 text-dark-50 font-weight-bold font-size-lg text-right max-w-400px new-style" :class="message.id_send == contact.id ? 'bg-light-primary text-right ' : ' bg-light-success text-left' " >
                                                    {{message.message}}
                                             <span class="text-muted font-size-sm" style="margin-left: 2em; float: right;">{{message.created_at}}</span>

                                                </div>
                                            </div>
                                    </span>
                                <!--end::Message In-->
                                </div>
                        </div>
                    </div>
                    <!--end::Messages-->
                    <!-- <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; height: 271px; right: -2px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 75px;"></div>
                    </div> -->
                </div>
                <!--end::Scroll-->
            </div>
            <div class="card-footer align-items-center" style="display: flex; padding: 10px; position: absolute; width: 100%; bottom: 0;" ref="feed">
            <!-- <div>{{message.user.name}}</div> -->
            <form id="app" @submit="checkForm" action="conversation/send" method="post" class="flex" >
                <div class="d-flex align-items-center justify-content-between ">
                    <div>
                        <button type="button" class="btn btn-primary " v-on:click=" reponse = true">Reponse</button>
                    </div>
                </div>
                <input
                  type="text"
                  v-model="text"
                  required
                  @keydown.enter="send"
                  class="form-control"
                  placeholder="Message......"
                  style="width: 90%"
                />

                <div class="d-flex align-items-center justify-content-between ">
                    <div>
                        <button type="submit" class="btn btn-primary ">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
        <span v-if="reponse == true">

            <div class="reponse" v-on:click=" reponse = false; auto = '';">
                <div class=" wt">
                    <h2>Travail</h2><hr>
                    <span class="textreponse" v-on:click=" reponse = false;
                    text = 'Salut, c\'est un grand plaisir pour moi de vous avoir sur ce tchat. Pour commencer je souhaite avoir votre date de naissance svp car à partir de là je vais me connecter à votre arbre de vie et interpréter votre situation actuelle et future ';
                    " >Salut, c'est un grand plaisir pour moi de vous avoir sur ce tchat. Pour commencer je souhaite avoir votre date de naissance svp car à partir de là je vais me connecter à votre arbre de vie et interpréter votre situation actuelle et future </span>
                    <span class="textreponse" v-on:click=" reponse = false; text = 'Merci, je vois directement que vous êtes une personne plein de potentiels et de compétences. Toutefois je ressens que la situation n\'est pas du tout bonne car votre étoile est sombre. Avez-vous remarqué que rien ne marche tel que vous le souhaitez ?';" >
                        Merci, je vois directement que vous êtes une personne plein de potentiels et de compétences. Toutefois je ressens que la situation n'est pas du tout bonne car votre étoile est sombre. Avez-vous remarqué que rien ne marche tel que vous le souhaitez ?</span>
                    <span class="textreponse" v-on:click=" reponse = false; text = 'Il est grand temps pour vous de faire un diagnostic complet de votre vie professionnel et de vous débarrasser cette énergie négative qui vous empêche d\'évoluer. j\'ai une solution à vous apporter maintenant.';" >
                        Il est grand temps pour vous de faire un diagnostic complet de votre vie professionnel et de vous débarrasser cette énergie négative qui vous empêche d'évoluer. j'ai une solution à vous apporter maintenant.</span>
                </div>
                <div class=" wt">
                    <h2>Famille</h2><hr>
                    <span v-on:click=" reponse = false; text = 'Bonjour; je suis ravie de vous lire à ce moment et je vais de ce fait vous apporter des éléments de solutions pour restaurer le lien familial. Tout d\'abord voulez vous me donner votre date de naissance svp ainsi qu\'un chiffre entre 1 et 22 svp'; " class="textreponse" >
                        Bonjour; je suis ravie de vous lire à ce moment et je vais de ce fait vous apporter des éléments de solutions pour restaurer le lien familial. Tout d'abord voulez vous me donner votre date de naissance svp ainsi qu'un chiffre entre 1 et 22 svp</span>
                    <span v-on:click=" reponse = false; text = 'Cette date me laisse voir de prime à bord que vous êtes une personne soucieuse du bien de la famille mais je ressens qu\'il y\'a un blocage entre les différents membres de la famille avez vous remarqué cela ? Quel est votre sollicitation ?'; " class="textreponse" >
                        Cette date me laisse voir de prime à bord que vous êtes une personne soucieuse du bien de la famille mais je ressens qu'il y'a un blocage entre les différents membres de la famille avez vous remarqué cela ? Quel est votre sollicitation ?</span>
                    <span v-on:click=" reponse = false; text = 'Cela n\'est pas compliqué pour moi j\'ai le sentiment que vous êtes sur la mauvaise voie et qu\'il y\'a nécessité de recadrer les choses car je ressens de la jalousie, l\'hypocrisie autour de vous. J\'ai un secret à vous annoncer pour remettre la balance à niveau.'; " class="textreponse" >
                        Cela n'est pas compliqué pour moi j'ai le sentiment que vous êtes sur la mauvaise voie et qu'il y'a nécessité de recadrer les choses car je ressens de la jalousie, l'hypocrisie autour de vous. J'ai un secret à vous annoncer pour remettre la balance à niveau.</span>
                </div>
                <div class=" wt">
                    <h2>Argent</h2><hr>
                    <span class="textreponse" v-on:click=" reponse = false; text = 'Bonjour je vous invite à me donner un chiffre entre 1 et 22 suivit de votre date de naissance et en fonction du chiffre je vais tirer une carte pour voir ce qu’il en est';" >
                        Bonjour je vous invite à me donner un chiffre entre 1 et 22 suivit de votre date de naissance et en fonction du chiffre je vais tirer une carte pour voir ce qu’il en est</span>
                    <span class="textreponse" v-on:click=" reponse = false; text = 'Merci, mon tirage montre des possibilités meilleures d’avenir pour vous pourtant je vois comme quelque chose qui semble vous freiner en ce moment, cela vous dit quelque chose ?';">
                        Merci, mon tirage montre des possibilités meilleures d’avenir pour vous pourtant je vois comme quelque chose qui semble vous freiner en ce moment, cela vous dit quelque chose ?</span>
                    <span class="textreponse" v-on:click=" reponse = false; text = 'D’accord, pour moi il y’a quelque chose de précis à faire et vous semblez parfois négliger cela, il est crucial que je vous révèle ce que les cartes disent à propos de vos finances';">
                        D’accord, pour moi il y’a quelque chose de précis à faire et vous semblez parfois négliger cela, il est crucial que je vous révèle ce que les cartes disent à propos de vos finances</span>
                </div>
                <div class=" wt">
                    <h2>Amour</h2><hr>
                    <span class="textreponse" v-on:click=" reponse = false; text = 'Bonjour vous faites bien de me contacter, je vais de suite me pencher sur votre situation, et pour ce faire pouvez-vous vous me donner un chiffre entre 1 et 22 ? Je vais me canaliser sur vous pour vous apporter une réponse ';" >
                        Bonjour vous faites bien de me contacter, je vais de suite me pencher sur votre situation, et pour ce faire pouvez-vous vous me donner un chiffre entre 1 et 22 ? Je vais me canaliser sur vous pour vous apporter une réponse </span>
                    <span class="textreponse" v-on:click=" reponse = false; text = 'Merci, je vois directement un blocage et ce qui me gêne est de savoir que vous semblez utiliser les mauvaises méthodes, ressentez vous cette barrière en ce moment précis ?';">
                        Merci, je vois directement un blocage et ce qui me gêne est de savoir que vous semblez utiliser les mauvaises méthodes, ressentez vous cette barrière en ce moment précis ?</span>
                    <span class="textreponse" v-on:click=" reponse = false; text = 'Bien, pour moi vous devez impérativement changer quelque chose pour vivre ce bonheur, j’ai la sensation que vous risquerez de passer à côté de cela, d’ailleurs j’ai un secret à vous annoncer';">
                        Bien, pour moi vous devez impérativement changer quelque chose pour vivre ce bonheur, j’ai la sensation que vous risquerez de passer à côté de cela, d’ailleurs j’ai un secret à vous annoncer</span>
                </div>

            </div>
        </span>

    </div>

</template>
<script>

export default {
    props:{
            reponse : false,
            auto : '',
            contact:{
                type:Object
            },
            messages:{
                type:Array,
                require: true
            },
            users:{
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
            nextmessage: {
            type: Array,
            require: true,
            },
            Active:{
                type:Object,
                require: true
            }

        },


        data(){
        return{
            text:'',
            id_user : null,
            name_voyant : false,
            isMobile: false,

        }
    },
    created(){
        this.name_voyant = this.Active
        this.id_user = this.messages.user
    },
    methods:{
        checkIfMobile() {
            this.isMobile = window.matchMedia("(max-width: 768px)").matches;
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
            }),
            this.$emit('send', this.text)
            this.text = '';

        },
        scrollToBottom(){
            setTimeout(()=>{
                let scrollableBlock = this.$refs.card_body
                this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                scrollableBlock.scrollTop = scrollableBlock.scrollHeight + 20;
            },50);
        },
        selectVoyant(name_voyant){
            this.Active = name_voyant
            this.scrollToBottom()
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

    watch:{
        user(users){
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
    .reponse{
        position: fixed;
        top: 0;
        left: 0;
        background: #000000b5;
        width: 100%;
        height: 100vh;
        z-index: 9999999;
        display: flex;
    }
    .wt{
        width: 24%;
        border: solid 1px rgb(255, 255, 255);
        color: #fff;
        display: inline-block;
    }
    .wt h2{
        text-align: center;
        margin: 0;
        padding: 0;
        border-bottom: solid 1px #fff;
    }
    .textreponse{
        display: block;
        width: 90%;
        height: auto;
        border-radius: 5px;
        background: #fff;
        color: black;
        padding: 15px;
        margin: 0 15px 20px 15px;
        cursor: pointer;
    }
    .textreponse:hover{
        background: rgba(97, 96, 96, 0.7);
        color: #fff;
    }
    .messagesend{
        border: solid 1px rgb(202, 197, 197);
        margin: 0 2px 0 2px;
    }
</style>

