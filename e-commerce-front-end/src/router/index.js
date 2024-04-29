import {createRouter,createWebHistory } from 'vue-router'
import Home from '../views/Home.vue';
import ContactUs from '../views/contact-us.vue'
import RegisterPage from '../views/register.vue'
import LoginPage from '../views/login.vue'
import Index from '../views/index.vue'
import UpdateProfile from '../views/updateprofile.vue'
import ChangePassword from '../views/change_password.vue'
import ForgetPassword from '../views/forget_password.vue'
import UpdatePassword from '../views/update_password.vue'

const routes = [
    {
        path: '/',
        name: 'home',
        components: {default: Home}
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterPage
    },
    {
        path: '/login',
        name: 'login',
        component: LoginPage
    },
    {
        path: '/contactus',
        name: 'contactus',
        component: ContactUs
    },
    {
        path: '/index',
        name: 'Index',
        component: Index
    },
    {
        path: '/updateprofile',
        name: 'updateprofile',
        component: UpdateProfile
    },
    {
        path: '/change_password',
        name: 'change_password',
        component: ChangePassword
    },
    {
        path: '/forget_password',
        name: 'forget_password',
        component: ForgetPassword
    },
    {
        path: '/update_password/:token',
        name: 'update_password',
        component: UpdatePassword
    },
   
]
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: routes
})

export default router