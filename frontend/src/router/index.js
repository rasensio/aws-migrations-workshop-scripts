import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Connection from '../views/Connection.vue'

Vue.use(VueRouter)

const routes = [
  { path: '/', component: Home },
  { path: '/connection', component: Connection },
]

const router = new VueRouter({
  routes
})

export default router
