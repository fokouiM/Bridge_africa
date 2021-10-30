<template>
    <div class="tex-credit">
        <a href="pack" class="btn btn-light-primary font-weight-bold btn-sm px-5 font-size-base ml-2"> Credit : {{credit.user}} </a>
    </div>
</template>
<script>

export default {
    props: {
    credit: {
      type: Array,
      require: true,
    },
  },
    mounted() {



          setInterval(() => {

                axios.get("/getcredit").then((response) => {
          this.credit = response.data; })
            }, 2000);
    },

};
</script>
<style>
 .tex-credit{
     text-align: center;
    background: #fff;
    padding: 8px 0;
 }
</style>

