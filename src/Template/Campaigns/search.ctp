<table class="table">
    <tr>
        <th>Campaign name</th>
        <th>Actions</th>
    </tr>
<?php foreach ($campaigns as $campaign): ?>
    <tr>
        <td><?= $campaign['name'] ?></td>
        <td>
            <a href="<?= $this->Url->build(['controller' => 'campaigns', 'action' => 'edit', $campaign['id']]) ?>" class="btn btn-primary">Edit</a>
        </td>
    <tr>
<?php endforeach; ?>
</table>