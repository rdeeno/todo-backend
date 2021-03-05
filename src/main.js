import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

Vue.config.productionTip = false
Vue.use(VueRouter);

const Todo = () => import('./components/ToDo.vue')
const History = () => import('./components/History.vue')
const routes = [
  { path: '/todo', component: Todo },
  { path: '/history', component: History }
]

const router = new VueRouter({
  routes
})
new Vue({
  router: router,
  render: h => h(App),
}).$mount('#app')
