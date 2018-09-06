<template>
  <div class="modal" :class='isActiveProp'>
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{note.title}}</p>
        <button class="delete" aria-label="close" @click='closeModal'></button>
      </header>
      <section class="modal-card-body">
        <div class="label-block">
          Do you want to delete this note?
        </div>
      </section>
      <footer class="modal-card-foot">
        <button class="button" @click='trash'>Delete</button>
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
      itemKey:null
    }
  },
  methods:{
    closeModal(){
      this.$emit('closeModal');
    },
    trash(){
      if(confirm("Are you sure?")){
          axios.delete('/note/'+this.note.id)
          .then(res=>{
            console.log(res);
            this.$emit('deleteNote');
            this.closeModal();
          })
          .catch(err=>{
            this.errors = err.response.data.errors;
            console.log(err.response.data.errors);
          });
      }
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