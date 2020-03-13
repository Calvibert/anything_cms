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
.content {
    background: #fafafa;
    max-width: 1140px;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    overflow: hidden;
}
</style>

<Header/>

<div class="content">
<svelte:component this={routes[curRoute]}/>
</div>

<Footer/>
