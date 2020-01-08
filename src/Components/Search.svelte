<script>
import Card from "./Card.svelte";

let data = "";
let key = "";
let status = "";

async function search() {
    status = "waiting";
    const response = await fetch("http://192.168.33.10/products/search?key="+key, {
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
        if (response.ok) { // if HTTP-status is 200-299
            const text = await response.text();
            data = JSON.parse(text);
        }
}
</script>

<input on:change={search} bind:value={key} type="text" name="key"/>
<button on:click={search}>Search</button>

{#each data as item}
<Card data={item}/>
{:else}
    {#if status === 'waiting'}
        <p>Loading...</p>
    {/if}
<p></p>
{/each}