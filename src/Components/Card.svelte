<script>
export let data;
import {commit} from "./Search.svelte";

function destroy() {
    this.destroy();
}
</script>
<style>
.card-image {
    max-width: 200px;
}
.card-container {
    border: 1px solid black;
    border-bottom: none;
}
</style>

<div class="card-container">
<table>
<tr><td>{data['title']}</td></tr>
<tr><td><img src="http://192.168.33.10/img/{data['image']}" alt="{data['title']}" class="card-image"/></td></tr>
<tr><td><button>Commit now!</button></td></tr>
</table>
</div>