import { createRouter, createWebHistory } from "vue-router";
import login from './pages/login.vue';
import registro from './pages/registro.vue';
import dashboard from "./pages/dashboard.vue";


const routes = [{path: '/login', component: login},
                {path: '/registro', component: registro},
                {path: '/dashboard', component: dashboard}
] ;

const router = createRouter({

    history : createWebHistory(),
    routes,



})

export default router;