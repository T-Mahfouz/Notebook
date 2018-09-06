<template>
  <div class="modal" :class='isActiveProp'>
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">New note</p>
        <button class="delete" aria-label="close" @click='closeModal'></button>
      </header>
      <section class="modal-card-body">

        <div class="field">
          <label for="" class="label">Title:</label>
          <p class="control has-icons-left has-icons-right">
            <input :class='{"has-error":errors.title}' class="input" type="text" placeholder="Title" v-model='note.title'>
            <span class="icon is-small is-left" style="margin: -7px;">
              <i class="fa fa-newspaper-o"></i>
            </span>
            <span class="icon is-small is-right" style="margin: -7px;">
              <i class="fa fa-check"></i>
            </span>
          </p>
          <small v-if='errors.title'>{{errors.title[0]}}</small>
        </div>
        

        <div class="field">
          <label for="" class="label">Phone:</label>
          <p class="control has-icons-left has-icons-right">
            <input :class='{"has-error":errors.phone}' class="input" type="text" placeholder="Phone" v-model='note.phone'>
            <span class="icon is-small is-left" style="margin: -7px;">
              <i class="fa fa-phone"></i>
            </span>
            <span class="icon is-small is-right" style="margin: -7px;">
              <i class="fa fa-check"></i>
            </span>
          </p>
          <small v-if='errors.phone'>{{errors.phone[0]}}</small>
        </div>
        

        <div class="field">
          <label for="" class="label">Email:</label>
          <p class="control has-icons-left has-icons-right">
            <input :class='{"has-error":errors.email}' class="input" type="email" placeholder="Email" v-model='note.email'>
            <span class="icon is-small is-left" style="margin: -7px;">
              <i class="fa fa-envelope"></i>
            </span>
            <span class="icon is-small is-right" style="margin: -7px;">
              <i class="fa fa-check"></i>
            </span>
          </p>
          <small v-if='errors.email'>{{errors.email[0]}}</small>
        </div>
        

        <div class="field">
          <label for="" class="label">Content:</label>
          <div class="control">
            <textarea :class='{"has-error":errors.content}' class="textarea is-hovered" type="text" placeholder="Note Content" v-model='note.content'></textarea>
          </div>
          <small v-if='errors.content'>{{errors.content[0]}}</small>
        </div>
        

      </section>
      <footer class="modal-card-foot">
        <button class="button is-success" @click='save'>Add Note</button>
        <button class="button" @click='closeModal'>Cancel</button>
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
    save(){
      axios.post('/note',this.note)
        .then(res=>{
          console.log(res);
          this.$emit('newNote',res);
          this.closeModal();
        })
        .catch(err=>{
          this.errors = err.response.data.errors;
          console.log(err.response.data.errors);
        });
    },
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