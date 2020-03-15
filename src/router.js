import Search from './Components/Search.svelte';
import Home from './Components/Home.svelte';
import View from './Components/View.svelte'
import Registration from './Components/Registration.svelte';
import Signup from './Components/Registration/Signup.svelte';
import Reset from './Components/Registration/Reset.svelte';
import Menu from './Components/Main/Menu.svelte';

import { writable } from 'svelte/store';

let firstRoute = window.location.pathname;

// Routes are defined here
const routes = {
    '/': Home,
    '/home': Home,
    '/search': Search,
    '/login': Registration,
    '/signup': Signup,
    '/reset': Reset,
    '/view': View,
    '/menu': Menu
};

export default routes;
export const mainRoute = writable(firstRoute);
export const subRoute = writable('/');
