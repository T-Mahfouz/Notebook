<template>
  <div class="container">
    <nav class="panel column is-8 is-offset-2">
      <p class="panel-heading">
        <span class="">
        Notes
        </span>
        <button class="button is-primary is-pulled-right" @click='openAdd'>Add Note</button>
      </p>
      <div class="panel-block">
        <p class="control has-icons-left">
          <input class="input is-small" type="text" v-model='keyword' placeholder="search">

          <span class="icon is-small is-left">
            <i class="fa fa-search" aria-hidden="true"></i>
          </span>
        </p>
      </div>

      <div v-for='note,index in Searchnotes'>

        <div class="panel-block single-note">
          <div class="column is-10">
            {{index+1}} 
            <span class="panel-icon" style="margin-top: 5px;">
              <i class="fa fa-book" aria-hidden="true"></i>
            </span>
            <span>
              {{note.title}}
            </span>
          </div>

          <div class="column is-2">

            <i @click='openShow(index)' style="cursor:pointer;" class="icon fa fa-eye has-text-primary" aria-hidden="true"></i>

            <i @click='openEdit(index)' style="cursor:pointer;" class="icon fa fa-cog fa-button has-text-success" aria-hidden="true"></i>

            <i @click='openDelete(index)' style="cursor:pointer;" class="icon fa fa-trash has-text-danger" aria-hidden="true"></i>

          </div>

        </div>
      </div>

      <nav class="pagination  is-centered" role="navigation" aria-label="pagination">
        
        <ul class="pagination-list">
          <li><a v-if="pagination.prev_page_url" @click="fetchNotes(pagination.prev_page_url)" :class="{'isDisabled' : !pagination.prev_page_url}" class="pagination-previous">Previous</a></li>
          <li><a class="pagination-link is-current" aria-current="page">{{pagination.current_page}} of {{pagination.last_page}}</a></li>
          <li><a v-if="pagination.next_page_url" @click="fetchNotes(pagination.next_page_url)" :class="{'isDisabled' : !pagination.next_page_url}" class="pagination-next is-pulled-left">Next</a></li>
        </ul>
        
      </nav>


    </nav>

    <Addmodal :isActiveProp='isActive' @closeModal='colseModals' @newNote='PushNote($event)'></Addmodal>

    <ShowModal :isActiveProp='showIsActive' @closeModal='colseModals' ></ShowModal>

    <EditModal :isActiveProp='editIsActive' @closeModal='colseModals'></EditModal>

    <DeleteModal :isActiveProp='deleteIsActive' @closeModal='colseModals' @deleteNote='DeleteNote($event)'></DeleteModal>

  </div>
</template>

<script>
import Addmodal from "./Addmodal.vue";
import ShowModal from "./ShowModal.vue";
import EditModal from "./EditModal.vue";
import DeleteModal from "./DeleteModal.vue";
import SearchNote from "../mixins/SearchNote";

export default {
  data() {
    return {
      isActive: "",
      showIsActive: "",
      editIsActive: "",
      deleteIsActive: "",
      deleteCurrent: "",
      notes: [],
      Searchnotes: [],
      keyword: "",
      pagination:{}
    };
  },
  methods: {
    openAdd() {
      this.isActive = "is-active";
    },
    openShow(key) {
      this.showIsActive = "is-active";
      this.$children[1].note = this.notes[key];
    },
    openEdit(key) {
      this.editIsActive = "is-active";
      this.$children[2].note = this.notes[key];
    },
    openDelete(key) {
      this.deleteIsActive = "is-active";
      this.deleteCurrent = key;
      this.$children[3].note = this.notes[key];
      this.$children[3].itemKey = key;
    },
    colseModals() {
      this.isActive = this.showIsActive = this.editIsActive = this.deleteIsActive =
        "";
    },
    PushNote(note) {
      this.notes.push(note.data);
    },
    DeleteNote(key) {
      this.notes.splice(this.deleteCurrent, 1);
    },
    fetchNotes(page_url){
      let vm = this;
      page_url = page_url || "/notes";

      

      axios .get(page_url)
      .then(response => {
        //console.log(response.data.data);
        this.notes = this.Searchnotes = response.data.data;
        let links ={
          "current_page" :response.data.current_page,
          "first_page_url" :response.data.first_page_url,
          "last_page_url" :response.data.last_page_url,
          "last_page" :response.data.last_page,
          "next_page_url" :response.data.next_page_url,
          "prev_page_url" :response.data.prev_page_url,
          "from" :response.data.from,
          "to" :response.data.to,
          "total" :response.data.total
        }
        vm.makePagination(links);
      })
      .catch(error => console.log(error));
     
    },
    makePagination(links){
      this.pagination  = links;
    }

  },
  created() {
    this.fetchNotes();
  },
  mounted() {
    //console.log(this.$children);
  },
  components: {
    Addmodal,
    ShowModal,
    EditModal,
    DeleteModal
  },
  mixins: [SearchNote]
};
</script>


<style scoped>
p {
  color: green;
  font-size: 24px;
  font-weight: bold;
}
.pagination{
  margin-top:  20px;
}
.single-note{
  margin-top:  5px;
}
.isDisabled {
  color: currentColor;
  cursor: not-allowed;
  opacity: 0.5;
  text-decoration: none;
}
</style>
