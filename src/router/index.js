import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CustomerServiceView from '../views/CustomerServiceView.vue'
import ProductBoard from '@/views/ProductBoard.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/category',
    name: 'category',
    component: ProductBoard
  },
  {
    path: '/customerservice',
    name: 'customerService',
    component: CustomerServiceView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
