<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <AddNotesForm />
        <p class="no-results" v-show="!notes.length">No results!</p>
        <div class="panel panel-default" v-for="note in notes">
          <div class="panel-body">
            {{note.note}}
            <a v-if="!loading" class="pull-right" @click.prevent="deleteNote(note)">
              <span class="remove-icon glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.no-results {
  font-weight: bold;
  text-align: center;
}
.remove-icon {
  color: red;
}
.remove-icon:hover {
  opacity: 0.5;
}
</style>

<script>
  import { mapGetters } from 'vuex'
  import AddNotesForm from './AddNotesForm.vue'

  export default {
    name: 'notes-list',
    components: {
      AddNotesForm
    },
    data:() => {
      return {
        loading: false
      }
    },
    created() {
      this.$store.dispatch("getNotes")
    },
    computed: {
      ...mapGetters([
        'currentUser',
        'notes'
      ])
    },
    methods: {
      deleteNote(note) {
        this.loading = true
        this.$store.dispatch("deleteNote", note).then((response) => {
          this.$toasted.success(response.data.msg)
        }).then(() => {
          this.loading = false
        })
      }
    }
  }
</script>
