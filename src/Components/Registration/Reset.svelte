<script>
import { mainRoute } from '../../router.js';

let email;
let error;

async function signup() {

}
</script>

<style>
input {
    border: none;
    margin: 0px;
    padding: 0px;
    caret-color: #006cff;
}
.input-container {
    background: #fff;
    border-radius: 10px;
    box-shadow: 1px 1px 5px 5px #f0f0f0;
    margin: 15px 25px;
}
</style>

<span on:click={() => {mainRoute.set('/login')}}>Back</span>

{#if error}
<h2>{error}</h2>
{/if}
<div class="input-container">
<table>
<tr>
<td class="td-icon">Img</td>
<td>
<input type="text" name="email" id="email" bind:value={email} placeholder="Email" required/>
</td>
</tr>
</table>
</div>

<div on:click={signup} class="btn" type="submit">RESET PASSWORD</div>
