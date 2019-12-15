<table class="table">
    <tr>
        <th><?= __('Email') ?></th>
        <th><?= __('Username') ?></th>
        <th><?= __('Name') ?></th>
        <th><?= __('Created') ?></th>
        <th><?= __('Actions') ?></th>
    </tr>
<?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['email'] ?></td>
        <td><?= $user['username'] ?></td>
        <td><?= $user['first_name'] .' '. $user['last_name'] ?></td>
        <td><?= $user['created'] ?></td>
        <td>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user['id']], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= $this->Html->link(__('Delete'), ['action' => 'delete', $user['id']], ['class' => 'btn btn-sm btn-danger']) ?>
        </td>
    </tr>
<?php endforeach; ?>
</table>
