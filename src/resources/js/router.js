import { createRouter, createWebHistory  } from "vue-router";
import PhotoList from './pages/PhotoList.vue'
import Login from './pages/Login.vue'


// パスとコンポーネントのマッピング
const routes = [
  {
    path: '/',
    component: PhotoList
  },
  {
    path: '/login',
    component: Login
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router
