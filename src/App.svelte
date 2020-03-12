<script>
import { writable } from 'svelte/store';
import { afterUpdate } from 'svelte';
import routes, { mainRoute } from './router.js';
import Footer from './Components/Main/Footer.svelte';

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
.logo {
    margin: auto;
    text-align: center;
    margin-top: 5px;
}
</style>

<div class="content">

<div class="logo" on:click={() => {mainRoute.set('/')}}><img src="img/icons/general/logo.png" alt="logo"/></div>

<svelte:component this={routes[curRoute]}/>

</div>

<Footer/>
