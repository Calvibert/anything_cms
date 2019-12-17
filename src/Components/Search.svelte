<script>
import { onMount } from "svelte";
var data = "";
  	onMount(async function() {
        const response = await fetch("https://anythingcms/products/search?key=test", {
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
			data = text;
		} else {
			console.log(response);
  			alert("HTTP-Error: " + response.status);
		}
	});
</script>

{@html data}