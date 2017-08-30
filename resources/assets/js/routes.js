import NotesList from './pages/notes/NotesList.vue'
import Login from './pages/auth/Login.vue'
import Register from './pages/auth/Register.vue'
import NotFound from './components/NotFound.vue'

export default [
  { path: '/', name: 'home', component: NotesList, meta: { requiresAuth: true } },
  { path: '/login', name: 'login', component: Login, meta: { redirectIfLogged: true } },
  { path: '/register', name: 'register', component: Register, meta: { redirectIfLogged: true } },
  { path: '*', name: 'not-found', component: NotFound }
]
