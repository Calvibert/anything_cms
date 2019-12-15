<br/>
<a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-primary"><?= __('Add') ?></a>
<br/><br/>
<input id="user-search-input" value="<?= $this->session->read('user-search-key') ?>" class="form-control"/>
<a id="user-search-btn" class="btn btn-primary"><?= __('Search') ?></a>
<br/><br/>
<div id="user-search-target"></div>

<script>
$(document).ready(userSearch());
$("#user-search-input").on('keypress', function(e) {
    if (e.which == 13) {
        userSearch();
    }
})
$("#user-search-btn").on('click', function() {
    userSearch();
});
function userSearch(key) {
    key = $("#user-search-input")[0].value;
    if ('<?= (!empty($this->session->read('user-search-key')))?$this->session->read('search-key'): 'undefined' ?>' !== 'undefined' && key !== undefined) {
        key = '<?= $this->session->read('user-search-key') ?>'
    }
    
    $.ajax({
        url: '<?= $this->Url->build(['action' => 'search']) ?>?key='+key,
        method: 'GET',
        success: function(response) {
            $("#user-search-target").html(response);
        }
    });
}
</script>