import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import CustomerServiceView from "../views/CustomerServiceView.vue";
import LoginView from "../views/LoginView.vue";
import IdRecover from "../views/IdRecover.vue";
import PwRecover from "../views/PwRecover.vue";
import JoinMember from "../views/JoinMember.vue";
import AppMyShop from "../views/AppMyShop.vue";
import MemberInformation from "../views/MemberInformation.vue";
import ReviewView from '../views/ReviewView.vue'
import DetailedPage from '../views/DetailedPage.vue' 
import ShoppingCart from '../views/ShoppingCartView.vue'
import ProductBoard from '@/views/ProductBoard.vue'
import TheOrderform from '../views/TheOrderform.vue'

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: '/category/:category',

    name: 'product',
    props: true,
    component: ProductBoard
  },
  {
    path: "/customerservice",
    name: "customerService",
    component: CustomerServiceView,
  },
  {
    path: "/login",
    name: "login",
    component: LoginView,
  },
  {
    path: "/idrecover",
    name: "idrecover",
    component: IdRecover,
  },
  {
    path: "/pwrecover",
    name: "pwrecover",
    component: PwRecover,
  },
  {
    path: "/joinmember",
    name: "joinmember",
    component: JoinMember,
  },
  {
    path: "/appmyshop",
    name: "appmyshop",
    component: AppMyShop,
  },
  {
    path: "/memberinformation",
    name: "memberinformation",
    component: MemberInformation,
  },
  {
    path: '/review',
    name: 'review',
    component: ReviewView
  },
  {
    path: '/detailed',
    name: 'detailed',
    component: DetailedPage
  },
  {
    path: '/theorder',
    name: 'theorder',
    component: TheOrderform
  },
  {
    path: '/shoppingcart',
    name: 'shoppingcart',
    component: ShoppingCart
  },
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
