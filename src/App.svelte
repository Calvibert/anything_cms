<script>
    import { writable } from 'svelte/store';
    import { getContext } from 'svelte';

    import routes, { curRoute } from './router.js';
</script>

<style>
.content {
    max-width: 1140px;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    overflow: hidden;
}
</style>

<div class="content">

<h1>Zuly logo ici<button on:click={() => {curRoute.set('/signup')}}>My Account</button></h1>

<svelte:component this={routes[$curRoute]}/>

</div>
