<template>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Laravel + Vue.js</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <router-link :to="{name:'home'}" tag="li" exact><a href="#">Home</a></router-link></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" v-show="authenticated">
          <li v-if="currentUser"><a>{{currentUser.name}}</a></li>
          <li><a @click.prevent="logout">Logout</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" v-show="!authenticated">
          <router-link :to="{name:'login'}" tag="li"><a href="#">Login</a></router-link></li>
          <router-link :to="{name:'register'}" tag="li"><a href="#">Register</a></router-link></li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'page-header',
  computed: {
    ...mapGetters([
      'currentUser',
      'authenticated'
    ])
  },
  methods: {
    logout() {
      this.$store.dispatch('logout').then(() => {
        this.$router.push({ name: 'login' })
      })
    }
  }
}
</script>
