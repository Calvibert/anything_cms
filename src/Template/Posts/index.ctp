<br/>
<a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-primary"><?= __('Add') ?></a>
<br/><br/>
<input id="post-search-input" value="<?= $this->session->read('post-search-key') ?>" class="form-control"/>
<a id="post-search-btn" class="btn btn-primary"><?= __('Search') ?></a>
<br/><br/>
<div id="post-search-target"></div>

<script>
$(document).ready(postSearch());
$("#post-search-input").on('keypress', function(e) {
    if (e.which == 13) {
        postSearch();
    }
})
$("#post-search-btn").on('click', function() {
    postSearch();
});
function postSearch(key) {
    key = $("#post-search-input")[0].value;
    if ('<?= (!empty($this->session->read('post-search-key')))?$this->session->read('search-key'): 'undefined' ?>' !== 'undefined' && key !== undefined) {
        key = '<?= $this->session->read('post-search-key') ?>'
    }
    
    $.ajax({
        url: '<?= $this->Url->build(['action' => 'search']) ?>?key='+key,
        method: 'GET',
        success: function(response) {
            $("#post-search-target").html(response);
        }
    });
}
</script>