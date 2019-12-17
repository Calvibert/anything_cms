<script>
	let name = 'world';
	import Search from "./Components/Search.svelte";
</script>

<h1>Hello {name}!</h1>

<input type="text" name="key"/>
<button>Search</button>

<Search />
