<br/>
<a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-primary"><?= __('Add') ?></a>
<br/><br/>
<input id="product-search-input" value="<?= $this->session->read('product-searchadmin-key') ?>" class="form-control"/>
<a id="product-search-btn" class="btn btn-primary"><?= __('Search') ?></a>
<br/><br/>
<div id="product-search-target"></div>

<script>
$(document).ready(productSearch());
$("#product-search-input").on('keypress', function(e) {
    if (e.which == 13) {
        productSearch();
    }
})
$("#product-search-btn").on('click', function() {
    productSearch();
});
function productSearch(key) {
    key = $("#product-search-input")[0].value;
    if ('<?= (!empty($this->session->read('product-search-key')))?$this->session->read('search-key'): 'undefined' ?>' !== 'undefined' && key !== undefined) {
        key = '<?= $this->session->read('product-search-key') ?>'
    }
    
    $.ajax({
        url: '<?= $this->Url->build(['action' => 'searchadmin']) ?>?key='+key,
        method: 'GET',
        success: function(response) {
            $("#product-search-target").html(response);
        }
    });
}
</script>