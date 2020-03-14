import Search from './Components/Search.svelte';
import Home from './Components/Home.svelte';
import View from './Components/View.svelte'
import Registration from './Components/Registration.svelte';

import { writable } from 'svelte/store';
// import { setContext } from 'svelte';

let firstRoute = window.location.pathname;

// Routes are defined here
const routes = {
    '/': Home,
    '/home': Home,
    '/search': Search,
    '/login': Registration,
    '/signup': Registration,
    '/view': View
};

export default routes;
export const mainRoute = writable(firstRoute);
export const subRoute = writable('/');