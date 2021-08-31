import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
// import Plan from "../views/Plan.vue";
import Food from "../views/Food.vue";


import Login from "../views/Login.vue";
import Register from "../views/Register.vue";



import Admin from "../views/Admin.vue";

import MenuAdmin from "../views/MenuAdmin.vue";
import Planadmin from "../views/Planadmin.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/food",
    name: "food",
    component: Food,
  },

  {
    path: "/food/:id",
    name: "food",
    component: Food,
  },
  
  {
    path: "/login",
    name: "Login",
    component: Login,
  },


  {
    path: "/Register",
    name: "Register",
    component: Register,
  },


  {
    path: "/Admin",
    name: "Admin",
    component: Admin,
  },

  {
    path: "/MenuAdmin",
    name: "MenuAdmin",
    component: MenuAdmin,
 },


  {
    path: "/menuresto/:id",
    name: "menuresto",
    component: MenuAdmin,
 },

{

 path: "/Planadmin",
    name: "Planadmin",
    component: Planadmin,

} ,

   



  // {
  //   path: "/plan",
  //   name: "Plan",
  //   component: Plan,
  // },
  
  // {
  //   path: "/plan",
  //   name: "plan",
  //   // route level code-splitting
  //   // this generates a separate chunk (plan.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () =>
  //     import(/* webpackChunkName: "about" */ "../views/Plan.vue"),
  // },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

export default router;
