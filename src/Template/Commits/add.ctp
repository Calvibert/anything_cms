<h1>Add</h1>

<?= $this->element('Components/search', [
    'controller' => 'Campaigns',
    'action' => 'search',
    'target' => 'campaign-search-target',
    'label' => 'Campaign'
]) ?>
<div id="campaign-search-target"></div>

<div id="price_tier_container">
    <label for="price">Price
    <input type="text" id="price" name="price"/>
    </label>
    <br/>
    <label for="tier_order">Tier #
    <input type="text" id="tier_order" name="tier_order" value="1"/>
    </label>
</div>

<input type="submit" class="btn btn-primary" value="Create All"/>
</form>