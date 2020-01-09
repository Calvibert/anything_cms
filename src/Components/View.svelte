<script>
import { onMount } from 'svelte';
import getUrlVars from "../helper.js";

let id;
let data;

onMount(async () => {
    id = getUrlVars()['c'];
    const response = await fetch("http://192.168.33.10/products/view?key="+id, {
        method: 'GET',
        mode: 'cors',
        headers: new Headers({
            'Accept': '*/*',
            'Accept-Encoding': 'gzip, deflate, br',
            'Accept-Language': 'en-US,en;q=0.9,fr;q=0.8',
            'Cache-Control': 'no-cache',
            'Connection': 'keep-alive',
            'Cookie': 'CAKEPHP=bqtbcn9s9q1kkaejp6nftss22o954b4s',
            'Host': 'anythingcms',
            'Pragma': 'no-cache'
        })
    });
    if (response.ok) {
        const text = await response.text();
        data = JSON.parse(text);
        console.log(data);
    }
});
</script>

<style>
.card-image {
    max-width: 400px;
}
</style>

{#if data}
<table>
<tr>
<td>
<img src="http://192.168.33.10/img/{data['image']}" alt="{data['title']}" class="card-image"/>
</td>
<td>
<table>
<tr><td><h1>{data['title']}</h1></td></tr>
<tr><td><p>{data['description']}</p></td></tr>
</table>

</td></tr>
{#if data['campaigns'].length === 0}
<tr><td>No campaigns at this time</td></tr>
{:else}
<tr><td>{data['campaigns'][0]['name']}</td></tr>
{/if}
</table>
{/if}