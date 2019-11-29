<br/>
<a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-primary"><?= __('Add') ?></a>
<br/><br/>
<input id="author-search-input" value="<?= $this->session->read('author-search-key') ?>" class="form-control"/>
<a id="author-search-btn" class="btn btn-primary"><?= __('Search') ?></a>
<br/><br/>
<div id="author-search-target"></div>

<script>
$(document).ready(authorSearch());
$("#author-search-input").on('keypress', function(e) {
    if (e.which == 13) {
        authorSearch();
    }
})
$("#author-search-btn").on('click', function() {
    authorSearch();
});
function authorSearch(key) {
    key = $("#author-search-input")[0].value;
    console.log(key);
    if ('<?= (!empty($this->session->read('author-search-key')))?$this->session->read('author-search-key'): 'undefined' ?>' !== 'undefined' && key === '') {
        key = '<?= $this->session->read('author-search-key') ?>'
    }
    
    $.ajax({
        url: '<?= $this->Url->build(['action' => 'search']) ?>?key='+key,
        method: 'GET',
        success: function(response) {
            $("#author-search-target").html(response);
        }
    });
}
</script>