<script>
import validator from 'validator';
import { mainRoute } from '../../router.js';

let email;
let username;
let password;
let error;

async function signup () {
    if (email === undefined) {
        error = 'Please enter an email';
        return 0;
    }
    if (!validator.isEmail(email+"")) {
        error = 'Please enter a valid email';
        return 0;
    }
    if (username === undefined) {
        error = 'Please enter a username';
        return 0;
    }
    if (password === undefined) {
        error = 'Please enter a password';
        return 0;
    }
    if (password.length < 8) {
        error = 'Password must be at least 8 characters long';
        return 0;
    }
    error = undefined;
    var data = {
        email: email,
        username: username,
        password: password
    };
    const response = await fetch("http://192.168.33.10/users/add", {
        method: 'POST',
        mode: 'cors',
        body: JSON.stringify(data),
        headers: new Headers({
            'Accept': '*/*',
            'Accept-Encoding': 'gzip, deflate, br',
            'Accept-Language': 'en-US,en;q=0.9,fr;q=0.8',
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache',
            'Connection': 'keep-alive',
            'Cookie': 'CAKEPHP=bqtbcn9s9q1kkaejp6nftss22o954b4s',
            'Host': 'anythingcms',
            'Pragma': 'no-cache'
        })
    });
    if (response.ok) {
        const text = await response.text();
        console.log(text);
        data = JSON.parse(text);
        if (data.message === 'error') {
            
        }
    }
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
table {
    width: 100%;
}
td {
    border-bottom: 1px solid #fafafa;
    padding: 5px;
}
.td-icon {
    width: 15px;
}
</style>

{#if error}
<h2>{error}</h2>
{/if}
<div class="input-container">
<table>
<tr>
<td class="td-icon">Img</td>
<td>
<input type="text" name="email" id="email" bind:value={email} placeholder="Username/email" required/>
</td>
</tr>

<tr>
<td class="td-icon">Img</td>
<td>
<input type="password" name="password" id="password" bind:value={password} placeholder="Password" required/>
</td>
</tr>
</table>
</div>

<div on:click={signup} class="btn" type="submit">LOGIN</div>


<table style="text-align: center">
<tr>
<td>FB</td>
<td>TW</td>
<td>GG</td>
</tr>
</table>

<div style="text-align: center">
<p>Forgot password? <span on:click={() => {mainRoute.set('/reset')}}>Reset your password</span></p>
<p>Don't have an account? <span on:click={() => {mainRoute.set('/signup')}}>Sign up</span></p>
</div>