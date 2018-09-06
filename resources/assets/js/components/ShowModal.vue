<template>
  <div class="modal" :class='isActiveProp'>
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{note.title}}</p>
        <button class="delete" aria-label="close" @click='closeModal'></button>
      </header>
      <section class="modal-card-body">

        <div class="">
          <label class="column is-12">Title:</label>
          <span class="panel-block column is-12">{{note.title}}</span>
        </div>
        <div class="">
          <label class="column is-12">Phone:</label>
          <span class="panel-block column is-12">{{note.phone}}</span>
        </div>
        <div class="">
          <label class="column is-12">E-mail:</label>
          <span class="panel-block column is-12">{{note.email}}</span>
        </div>
        <div class="">
          <label class="column is-12">Content:</label>
          <span class="panel-block column is-12">{{note.content}}</span>
        </div>

      </section>
      <footer class="modal-card-foot">
        <button class="button" @click='closeModal'>Close</button>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
  props:['isActiveProp'],
  data(){
    return {
      note:{},
      errors:{},
    }
  },
  methods:{
    closeModal(){
      this.$emit('closeModal');
    }
  },
  created(){

  },
  mounted() {

  },

}
</script>


<style scoped>
p{
  color: green;
  font-size: 24px;
  font-weight: bold;
}
.has-error{
  border-color: brown;
}
small{
  color: brown;
}
</style>