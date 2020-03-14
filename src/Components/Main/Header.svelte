<script>
import { afterUpdate } from 'svelte';
import { mainRoute } from '../../router.js';
</script>

<style>
.logo {
    background: #fff;
    margin: auto;
    text-align: center;
    margin-top: 10px;
}
.pull-left {
    margin-left: 5px;
}
.pull-right {
    margin-right: 5px;
}
</style>

<div class="logo">
<span class="pull-left"><div on:click={() => {mainRoute.set('/menu')}}><img src="img/icons/menu/menu.svg" alt="Menu"/></div></span>
<img on:click={() => {mainRoute.set('/')}} src="img/icons/general/logo.png" alt="logo"/>
<span class="pull-right"><div on:click={() => {mainRoute.set('/login')}}><img src="img/icons/menu/account.svg" alt="Account"/></div></span>
</div>