<script>
import Input from './Form/Input.svelte';

let email;
let username;
let password;

async function signup () {
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
        console.log(response);
        const text = await response.text();
        data = JSON.parse(text);
        if (data.message === 'error') {
            
        }
    }
}
</script>

<h1>Signup</h1>
<label for="email">Email</label>
<input type="text" name="email" id="email" bind:value={email}/>
<label for="username">username</label>
<input type="text" name="username" id="username" bind:value={username}/>
<label for="password">Password</label>
<input type="password" name="password" id="password" bind:value={password}/>
<br/>
<input on:click={signup} type="submit" value="Submit"/>
