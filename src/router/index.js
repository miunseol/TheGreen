import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import CustomerServiceView from "../views/CustomerServiceView.vue";
import LoginView from "../views/LoginView.vue";
import IdRecover from "../views/IdRecover.vue";
import PwRecover from "../views/PwRecover.vue";
import JoinMember from "../views/JoinMember.vue";
import AppMyShop from "../views/AppMyShop.vue";

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
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
