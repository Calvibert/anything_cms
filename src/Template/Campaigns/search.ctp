<table class="table">
<?php foreach ($campaigns as $campaign): ?>
    <tr>
        <td>
            <label for="<?= $campaign['id'] ?>"><?= $campaign['name'] ?></label>
        </td>
        <td>
            <input type="radio" name="campaign" id="<?= $campaign['id'] ?>" value="<?= $campaign['id'] ?>"/>
        </td>
    <tr>
<?php endforeach; ?>
</table>