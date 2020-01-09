<?php
use Cake\I18n\Number;
?>
<h1>Add Price Tiers</h1>
<h2>The prices will be sorted to created the tier orders, from highest to lowest</h2>

<form action="<?= $this->Url->build(['action' => 'edit', $objectId, $objectTable]) ?>" method="post">
    <div class="all-tiers-container">
        <?php foreach ($prices as $price): ?>
        <div id="price-tier-container" class="admin-card-container">
            <p>Price tier</p>
            <label for="price1">Price
            <input type="text" id="price1" name="price[]" value="<?= $this->Number->precision($price['price'], 2) ?>"/>
        </div>
        <?php endforeach; ?>
    </div>
    <button type="button" class="add-price-tier-btn btn btn-success">+</button><br/><br/>
    <input type="submit" value="Save Price Tiers" class="btn btn-success"/>
</form>

<script>
$(".add-price-tier-btn").click(function() {
    $("#price-tier-container").clone().appendTo(".all-tiers-container");
});
</script>