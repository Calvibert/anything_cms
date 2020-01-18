<script>
import v from 'voca';

export let name;
// export let type;
export let value;
</script>

<style>
input {
    border: none;
}
</style>

<label for="{name}">{v.capitalize(name)}</label>
<input type="text" name="{name}" id="{name}" bind:value/>