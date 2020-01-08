<script>
import { curRoute } from '../router.js';

export let path;
export let name;
function redirectTo(event){
    curRoute.set(event.target.pathname);
    window.history.pushState({path: path}, '', window.location.origin + path);
}
</script>

<style>
a {
    text-transform: uppercase;
    text-decoration: underline;
    padding: 1rem;
}
</style>
<a href={path} on:click|preventDefault={redirectTo}>{name}</a>