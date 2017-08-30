import axios from 'axios'

const state = {
  notes: []
}

const mutations = {
  GET_NOTES(state, notes) {
    state.notes = notes.reverse()
  },

  ADD_NOTE(state, note) {
    state.notes.unshift(note)
  },

  DELETE_NOTE(state, note) {
    state.notes.splice(note, 1)
  }
}

const actions = {
  getNotes({commit}) {
    return new Promise((resolve, reject) => {
      axios.get('/api/notes')
      .then((response) => {
        commit('GET_NOTES', response.data.data)
        resolve()
      })
      .catch((error) => {
        console.log(error);
      });
    }, error => console.log(error))
  },

  addNote({commit}, note) {
    return new Promise((resolve, reject) => {
      commit('ADD_NOTE', note)
      resolve()
    }, error => console.log(error))
  },

  deleteNote({commit}, note) {
    return new Promise((resolve, reject) => {
      axios.delete('/api/notes/'+note.id)
      .then((response) => {
        commit('DELETE_NOTE', note)
        resolve(response)
      })
      .catch((error) => {
        console.log(error);
      });
    }, error => console.log(error))
  }
}

const getters = {
  notes: (state) => {
    return state.notes
  }
}


export default {
  state,
  mutations,
  actions,
  getters
}
