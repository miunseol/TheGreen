import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CustomerServiceView from '../views/CustomerServiceView.vue'
import ReviewView from '../views/ReviewView.vue'
import ShoppingCart from '../views/ShoppingCartView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/customerservice',
    name: 'customerService',
    component: CustomerServiceView
  },
  {
    path: '/review',
    name: 'review',
    component: ReviewView
  },
  {
    path:'/shoppingcart',
    name: 'ShoppingCart',
    component: ShoppingCart
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
