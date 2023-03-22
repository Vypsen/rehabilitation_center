import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import Header from '../components/Header.vue'
import store from '../store'
import Dashboard from "../components/Dashboard.vue";
import AuthLayout from "../components/AuthLayout.vue";



const routes = [
    {
        path: '/',
        redirect: '/dashboard',
        component: Header,
        meta: {requiresAuth: true},
        children: [
            {path: '/dashboard', name: 'Dashboard', component: Dashboard},
        ]
    },
    {
        path: '/auth',
        redirect: '/login',
        name: 'Auth',
        component: AuthLayout,
        meta: {isGuest: true},
        children:[
            {path: '/login', name: 'Login', component: Login},
            {path: '/register', name: 'Register', component: Register},
        ]
    },

];

const router = createRouter(
    {
        history: createWebHistory(),
        routes
    }
)

router.beforeEach((to, from, next)=>{
    if (to.meta.requiresAuth && !store.state.user.token){
        next({name: 'Login'})
    } else if (store.state.user.token && to.meta.isGuest) {
        next({name: 'Dashboard'});
    } else {
        next();
    }
})

export default router;
