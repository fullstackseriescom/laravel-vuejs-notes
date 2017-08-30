import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from './modules/auth'
import notes from './modules/notes'

Vue.use(Vuex)

export default new Vuex.Store({
  modules:{
    auth,
    notes
  },
  plugins: [createPersistedState()]
})
