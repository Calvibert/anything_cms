<table class="table">
    <tr>
        <th><?= __('Title') ?></th>
        <th><?= __('Author') ?></th>
        <th><?= __('Created') ?></th>
        <th><?= __('') ?></th>
        <th><?= __('Actions') ?></th>
    </tr>
<?php foreach ($posts as $post): ?>
    <tr>
        <td><?= $post['title'] ?></td>
        <td><?= $post['Authors'][0]['first_name'] .' '. $post['Authors'][0]['last_name'] ?></td>
        <td><?= $post['created'] ?></td>
        <td></td>
        <td>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post['id']], ['class' => 'btn btn-sm btn-primary']) ?>
            <?php if (empty($post['active'])) : ?>
                <?= $this->Html->link(__('Enable'), ['action' => 'disable', $post['id']], ['class' => 'btn btn-sm btn-success']) ?>
            <?php else: ?>
                <?= $this->Html->link(__('Disable'), ['action' => 'disable', $post['id']], ['class' => 'btn btn-sm btn-warning']) ?>
            <?php endif; ?>
            <?= $this->Html->link(__('Delete'), ['action' => 'delete', $post['id']], ['class' => 'btn btn-sm btn-danger']) ?>
        </td>
    </tr>
<?php endforeach; ?>
</table>
