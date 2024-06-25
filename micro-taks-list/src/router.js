import { createRouter, createWebHistory } from "vue-router";
import login from './pages/login.vue';
import registro from './pages/registro.vue';


const routes = [{path: '/login', component: login},
                {path: '/registro', component: registro},
] ;

const router = createRouter({

    history : createWebHistory(),
    routes,



})

export default router;