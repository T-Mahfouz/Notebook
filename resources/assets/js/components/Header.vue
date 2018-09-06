<template>
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="">
          <!-- <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28"> -->
          <img :src='logo' alt="Notebook" width="40" height="28">
      </a>
     <router-link to='/home' class="a-link-header tag">Home</router-link>
     <router-link to='/about' class="a-link-header tag">About</router-link>
  </div>
</nav>
</template>

<script>
export default {
  props:['logo'],
    data(){
        return {

        }
    },
    methods:{

    },
    created(){

    },

}
</script>


<style scoped>


</style>