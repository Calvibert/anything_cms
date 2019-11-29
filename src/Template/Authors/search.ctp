<table class="table">
    <tr>
        <th><?= __('Name') ?></th>
        <th><?= __('Alias') ?></th>
        <th><?= __('Created') ?></th>
        <th><?= __('Date of Birth') ?></th>
        <th><?= __('Actions') ?></th>
    </tr>
<?php foreach ($authors as $author): ?>
    <tr>
        <td><?= $author['first_name'] .' '. $author['last_name'] ?></td>
        <td><?= $author['alias'] ?></td>
        <td><?= date('d-m-Y H:i:s', strtotime($author['created'])) ?></td>
        <td><?= date('d-m-Y', strtotime($author['date_of_birth'])) ?></td>
        <td>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $author['id']], ['class' => 'btn btn-sm btn-primary']) ?>
            <?php if (empty($author['active'])) : ?>
                <?= $this->Html->link(__('Enable'), ['action' => 'disable', $author['id']], ['class' => 'btn btn-sm btn-success']) ?>
            <?php else: ?>
                <?= $this->Html->link(__('Disable'), ['action' => 'disable', $author['id']], ['class' => 'btn btn-sm btn-warning']) ?>
            <?php endif; ?>
            <?= $this->Html->link(__('Delete'), ['action' => 'delete', $author['id']], ['class' => 'btn btn-sm btn-danger']) ?>
        </td>
    </tr>
<?php endforeach; ?>
</table>
