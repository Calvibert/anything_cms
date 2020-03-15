<script>
import { mainRoute } from '../../router.js';
</script>

<style>
.footer-container {
    position: fixed;
    bottom: 0px;
    width: 100%;
    left: 0px;
}
.footer-menu {
    position: fixed;
    width: 100%;
    text-align: center;
    bottom: 10px;
}
.menu-row {
    padding-bottom: 5px;
}
.selected {
    fill: #007FEB;
}
</style>

<div class="footer-container">
<table class="footer-menu">
<tr class="menu-row">
<td><div on:click={() => {mainRoute.set('/')}}><img class="selected" src="img/icons/menu/home.svg" alt="Home"/></div></td>
<td><div on:click={() => {mainRoute.set('/search')}}><img src="img/icons/menu/search.svg" alt="Search"/></div></td>
<td><div on:click={() => {mainRoute.set('/cart')}}><img src="img/icons/menu/cart.svg" alt="Cart"/></div></td>
<td><div on:click={() => {mainRoute.set('/login')}}><img src="img/icons/menu/account.svg" alt="Account"/></div></td>
<td><div on:click={() => {mainRoute.set('/other')}}><img src="img/icons/menu/hamburger.svg" alt="Other"/></div></td>
</tr>
</table>
</div>