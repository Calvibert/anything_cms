import { writable } from 'svelte/store';

let data = {
    logged: false
};

export const session = writable(data);
