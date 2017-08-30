import './bootstrap'
import Vue from 'vue'
import router from './router'
import store from './store'
import App from './components/App.vue'
import axios from 'axios'

const app = new Vue({
    router,
    store,
    el: '#app',
    render: h => h(App)
})
