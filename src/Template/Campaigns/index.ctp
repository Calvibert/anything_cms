<br/>
<a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-primary"><?= __('Add') ?></a>
<br/><br/>
<input id="campaign-search-input" value="<?= $this->session->read('campaign-search-key') ?>" class="form-control"/>
<a id="campaign-search-btn" class="btn btn-primary"><?= __('Search') ?></a>
<br/><br/>
<div id="campaign-search-target"></div>

<script>
$(document).ready(campaignSearch());
$("#campaign-search-input").on('keypress', function(e) {
    if (e.which == 13) {
        campaignSearch();
    }
})
$("#campaign-search-btn").on('click', function() {
    campaignSearch();
});
function campaignSearch(key) {
    key = $("#campaign-search-input")[0].value;
    if ('<?= (!empty($this->session->read('campaign-search-key')))?$this->session->read('search-key'): 'undefined' ?>' !== 'undefined' && key !== undefined) {
        key = '<?= $this->session->read('campaign-search-key') ?>'
    }
    
    $.ajax({
        url: '<?= $this->Url->build(['action' => 'search']) ?>?key='+key,
        method: 'GET',
        success: function(response) {
            $("#campaign-search-target").html(response);
        }
    });
}
</script>