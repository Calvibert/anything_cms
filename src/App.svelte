<script>
import { writable } from 'svelte/store';
import { afterUpdate } from 'svelte';
import routes, { mainRoute } from './router.js';
import Footer from './Components/Main/Footer.svelte';
import Header from './Components/Main/Header.svelte';

let curRoute;
afterUpdate(() => {
    if ($mainRoute === '/') {
        curRoute = '/';
        return 0;
    }
    curRoute = '/'+$mainRoute.split('/')[1];
});
</script>

<style>

</style>

<Header/>

<div class="content">
<svelte:component this={routes[curRoute]}/>
</div>

<Footer/>
