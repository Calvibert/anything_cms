<script>
export let prices;
export let commits;

let stages = [];
let target = prices[0]['amount'];
let progressBars = [];
var count = 0;
var finished = false;
for (var i = 0; i < prices.length; ++i) {
    if (finished) {
        progressBars[count] = 0;
        ++count;
        continue;
    }
    if (prices[i]['amount'] === 0) {
        continue;
    }
    if (prices[i]['amount'] < commits) {
        console.log(prices[i]['amount']);
        progressBars[count] = 1;
        ++count;
        continue;
    }
    progressBars[count] = (commits - prices[i - 1]['amount']) / (prices[i]['amount'] - prices[i - 1]['amount']);
    ++count;
    finished = true;
}


for (var i = 0; i < prices.length; ++i) {
    stages[i] = prices[i]['amount'];
    if (prices[i]['amount'] > target) {
        target = prices[i]['amount'];
    }
}
// progress = commits / target;
</script>

<style>
progress {
    width: 100%;
}
table {
    width: 100%;
}
td {
    text-align: left;
}
.price {
    text-align: center;
}
.reached {
    font-weight: 650;
    color: green;
}

</style>

<br/><br/><br/>
<table>
<tr>
{#each prices as price, index}
<td class="price {progressBars[index] !== 0 && progressBars[index] !== undefined ? 'reached': ''}">${price['price']}</td>
{/each}
</tr>
<tr>

{#each progressBars as bar}
<td>
<progress value={bar}/>
</td>
{/each}

</tr>
<tr>
{#each prices as price, index}
<td class="{progressBars[index] !== 0 && progressBars[index] !== undefined ? 'reached': ''}">{price['amount']}</td>
{/each}
</tr>
</table>