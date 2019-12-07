<label for="search-field"><?= $label ?>
<input type="text" id="search-field"/>
</label>
<button id="search-btn" class="btn btn-primary">Search</button>

<script>
$("#search-btn").click(function() {
    var data = $("#search-field").val();
    $.ajax({
        url: "<?= $this->Url->build(['controller' => $controller, 'action' => $action]) ?>?key="+data,
        method: "get",
        success: function(response) {
            $("#<?= $target ?>").html(response);
        }
    });
});
</script>