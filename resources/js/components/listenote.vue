<template>
<div>

                    <note :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
</div>
</template>
<script>
    import note from './note';

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
    components : {note}
}

</script>

