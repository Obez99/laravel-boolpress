window.Vue = require("vue");



import App from "./App.vue";
import Home from "./pages/Home";
import About from "./pages/About";
import Contact from "./pages/Contact";
import Post from "./pages/Post";

import VueRouter from "vue-router";
Vue.use(VueRouter);

const routes = [
  { path: '/', component: Home, name: 'home' },
  { path: '/about', component: About, name: 'about' },
  { path: '/contact', component: Contact, name: 'contact' },
  { path: '/post:slug', component: Post, name: 'post' },
]

const router = new VueRouter({
  mode: "history",
  routes
})

const app = new Vue({
  router,
  el: "#root",
  render: h => h(App)
})