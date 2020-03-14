<script>
    import { fly, scale, slide } from 'svelte/transition';
    import { quintOut } from 'svelte/easing';
    import { writable } from 'svelte/store';
    import { getContext } from 'svelte';

    import loggedIn from '../user.js';
    import routes, { mainRoute } from '../router.js';
    import Signup from './Registration/Signup.svelte';
    import Login from './Registration/Login.svelte';

    function select() {
        mainRoute.set(this.value);
    }
</script>

<style>

</style>

<div>
<!-- <div transition:fly="{{delay: 25, duration: 300, x: 0, y: 500, opacity: 0.5, easing: quintOut}}"> -->
<!-- <div transition:scale="{{duration: 300, delay: 0, opacity: 0, start: 0.25, easing: quintOut}}"> -->
<!-- <div transition:slide="{{delay: 0, duration: 300, easing: quintOut}}"> -->

{#if $mainRoute === '/login'}
<Login />
{:else}
<Signup />
{/if}

</div>

