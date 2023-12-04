import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import CustomerServiceView from "../views/CustomerServiceView.vue";
import LoginView from "../views/LoginView.vue";
import IdRecover from "../views/IdRecover.vue"

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
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
    path: "/recover",
    name: "recover",
    component: IdRecover,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
