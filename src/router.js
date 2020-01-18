import Search from './Components/Search.svelte';
import Home from './Components/Home.svelte';
import View from './Components/View.svelte'
import Signup from './Components/Signup.svelte';

import { writable } from 'svelte/store';
// import { setContext } from 'svelte';

// Routes are defined here
const routes = {
    '/': Search,
    '/home': Home,
    '/search': Search,
    '/signup': Signup,
    '/view': View
};

export default routes;
// setContext('curRoute', '/');
export const curRoute = writable('/');