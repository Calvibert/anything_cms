<script>
    import { fly, scale, slide } from 'svelte/transition';
    import { quintOut } from 'svelte/easing';
    import { writable } from 'svelte/store';
    import { getContext } from 'svelte';

    import { session } from '../session.js';
    import routes, { mainRoute } from '../router.js';
    import Login from './Registration/Login.svelte';
    import Account from './Account/Account.svelte';

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

{#if $session['logged']}
<Account/>
{:else}
<Login />
{/if}

</div>

