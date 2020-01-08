import Search from './Components/Search.svelte';
import Home from './Components/Home.svelte';
import View from './Components/View.svelte'
// import Signup from './Components/Signup.svelte';

import { writable } from 'svelte/store';

// Routes are defined here
const router = {
    '/': Search,
    '/home': Home,
    '/search': Search,
    // '/signup': Signup,
    '/view': View
};

export default router;
export const curRoute = writable('/view');