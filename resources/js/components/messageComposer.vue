<template>
    <div>


    </div>
</template>
<script >

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

    data(){
        return{
            text:'',
            id_user : message.user.id,
            name_voyant : '',

        }
    },
    methods:{

        checkForm(e) {
            // e.preventDefault();
            axios.post('/conversation/send',{
                text: this.text,
                id_user: this.id_user,
                name_voyant: this.name_voyant
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

