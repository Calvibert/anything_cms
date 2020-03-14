import { writable } from 'svelte/store';

let initial = false;

export const loggedIn = writable(initial);
