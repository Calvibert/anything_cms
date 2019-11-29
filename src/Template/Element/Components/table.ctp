<!-- This component is not completed so it probably needs work -->
<table class="table">
    <tr>
    <?php foreach ($headers as $header): ?>
        <th><?= $header ?></th>
    <?php endforeach; ?>
    </tr>
    <?php foreach ($data as $element): ?>
    <tr>
        <?php foreach ($element as $field): ?>
            <td><?= $field ?></td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
</table>