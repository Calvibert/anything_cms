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
<?php endif; ?>
<?php endforeach; ?>
<br/>
<input type="submit" value="Submit" class="btn btn-success"/>
</form>
<?php foreach ($autocompletes as $autocomplete): ?>
<?= $this->Html->script($autocomplete) ?>
<?php endforeach; ?>