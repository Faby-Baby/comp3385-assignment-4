import { createRouter, createWebHistory } from 'vue-router';
import AboutView from "../Pages/AboutView.vue";
import HomeView from "../Pages/HomeView.vue";
import AddMovieView from '../Pages/AddMovieView.vue';
import MoviesView from '../Pages/MoviesView.vue';
import LoginView from '../Pages/LoginView.vue';
import LogOut from '../components/LogOut.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            component: HomeView
        },
        {
            path: '/about',
            component: AboutView
        },
        {
            path: '/movies',
            component: MoviesView
        },
        {
            path: '/movies/create',
            component: AddMovieView

        },
        {
            path: '/login',
            component: LoginView
        },
        {
            path: '/logout',
            component: LogOut
        }
    ]
})

export default router;
