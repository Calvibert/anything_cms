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

<div class="logo" on:click={() => {mainRoute.set('/')}}>
<span class="pull-left"><img src="img/icons/menu/menu.svg" alt="Menu"/></span>
<img src="img/icons/general/logo.png" alt="logo"/>
<span class="pull-right"><img src="img/icons/menu/account.svg" alt="Account"/></span>
</div>