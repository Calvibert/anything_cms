<?php
// viewvars: $url, $method, $fields ($field, $type) pairs
use Cake\Utility\Inflector;
?>

<form action="<?= $url ?>" method="<?= $method ?>">
<?php foreach ($fields as $field => $type): ?>
<label for="<?= $field ?>"><?= Inflector::humanize($field) ?></label>
<?php if ($type === 'textarea'): ?>
    <textarea name="<?= $field ?>"><?= $defaults[$field] ?></textarea>
<?php elseif ($type === 'dateofbirth'): ?>
    <?= $this->Html->css('jquery-ui') ?>
    <?= $this->Html->script('jquery-ui') ?>
    <input type="text" id="<?= $field ?>" name="<?= $field ?>" value="<?= date('Y-m-d', strtotime($defaults[$field])) ?>"/>
    <script>
    $("#<?= $field ?>").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '-100:+0',
        dateFormat: 'yy-mm-dd'
    });
    </script>
<?php else: ?>
    <input type="<?= $type ?>" id="<?= $field ?>" name="<?= $field ?>" value="<?= $defaults[$field] ?>"/>
    <?php if (in_array($field, $autocompletes)): ?>
        <div class="autocomplete" id="autocomplete-<?= $field ?>"></div>
    <?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>
<br/>
<input type="submit" value="Submit" class="btn btn-success"/>
</form>

<script>
<?php foreach ($autocompletes as $autocomplete): ?>
$("#<?= $autocomplete ?>").on('keypress', function() {
    setTimeout(function() {
        var key = $("#<?= $autocomplete ?>")[0].value;
        $.ajax({
            url: '<?= $this->Url->build(['controller' => $autocomplete, 'action' => 'autocomplete']) ?>?key='+key,
            method: 'get',
            success: function(response) {
                JSON.parse(response);
                $("#autocomplete-<?= $autocomplete ?>").html(response);
            }
        });
    }, 100);
});
<?php endforeach; ?>
</script>