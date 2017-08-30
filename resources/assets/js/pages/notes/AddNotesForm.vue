<template>
  <form @submit.prevent="createNote" @keydown="form.errors.clear($event.target.name)">
    <div class="form-group" :class="{ 'has-error': form.errors.has('note') }">
      <input :disabled="form.busy" v-model="form.note" type="text" class="form-control" id="note" placeholder="Insert a note">
      <has-error :form="form" field="note"></has-error>
    </div>
  </form>
</template>

<script>
import { mapGetters } from 'vuex'
import { Form } from 'vform'

export default {
  name: 'add-notes-form',

  data: () => ({
    form: new Form({
      note: ''
    })
  }),

  computed: {
    ...mapGetters([

    ])
  },

  methods: {
    createNote() {
      this.form.post('/api/notes')
        .then(({ data }) => {
          this.$store.dispatch('addNote', data.data)
            .then(() => {
              this.form.reset()
              this.$toasted.success(data.msg)
            })
        }).catch((error) => {
          // console.log(error)
        })
    }
  }
}
</script>
