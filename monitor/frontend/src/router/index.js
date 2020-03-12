import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Endpoint from '../views/Endpoint.vue'

Vue.use(VueRouter)

const routes = [
  { path: '/', component: Home },
  { path: '/endpoint', component: Endpoint },
]

const router = new VueRouter({
  routes
})

export default router
