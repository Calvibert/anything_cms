<script>
    import { writable } from 'svelte/store';

    import router, { curRoute } from './router.js';
</script>

<div id="content">

<h1>Zuly logo ici</h1>

<svelte:component this={router[$curRoute]}/>

</div>
