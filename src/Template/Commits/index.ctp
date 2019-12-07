<br/>
<a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-primary"><?= __('Add') ?></a>
<br/><br/>
<input id="commit-search-input" value="<?= $this->session->read('commit-search-key') ?>" class="form-control"/>
<a id="commit-search-btn" class="btn btn-primary"><?= __('Search') ?></a>
<br/><br/>
<div id="commit-search-target"></div>

<script>
$(document).ready(commitSearch());
$("#commit-search-input").on('keypress', function(e) {
    if (e.which == 13) {
        commitSearch();
    }
})
$("#commit-search-btn").on('click', function() {
    commitSearch();
});
function commitSearch(key) {
    key = $("#commit-search-input")[0].value;
    if ('<?= (!empty($this->session->read('commit-search-key')))?$this->session->read('search-key'): 'undefined' ?>' !== 'undefined' && key !== undefined) {
        key = '<?= $this->session->read('commit-search-key') ?>'
    }
    
    $.ajax({
        url: '<?= $this->Url->build(['action' => 'search']) ?>?key='+key,
        method: 'GET',
        success: function(response) {
            $("#commit-search-target").html(response);
        }
    });
}
</script>