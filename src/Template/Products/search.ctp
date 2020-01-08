<table class="table">
    <tr>
        <th><?= __('Title') ?></th>
        <th><?= __('Model') ?></th>
        <th><?= __('Description') ?></th>
        <th><?= __('Created') ?></th>
        <th><?= __('Actions') ?></th>
    </tr>
<?php foreach ($products as $product): ?>
    <tr>
        <div class="product-card">
            <table>
                <tr><td><?= $product['title'] ?></td></tr>
                <tr><td><?= $this->Html->image($product['image'], ['fullBase' => true, 'width' => '200']) ?></td></tr>
                <tr><td><button><a href="">Commit Now!</a></button></td></tr>
            </table>
        </div>
    </tr>
    <!-- <tr>
        <td><?= $product['title'] ?></td>
        <td><?= $product['model_part'] ?></td>
        <td><?= $product['description'] ?></td>
        <td><?= $product['created'] ?></td>
        <td>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product['id']], ['class' => 'btn btn-sm btn-primary']) ?>
            <?php if (empty($product['active'])) : ?>
                <?= $this->Html->link(__('Enable'), ['action' => 'disable', $product['id']], ['class' => 'btn btn-sm btn-success']) ?>
            <?php else: ?>
                <?= $this->Html->link(__('Disable'), ['action' => 'disable', $product['id']], ['class' => 'btn btn-sm btn-warning']) ?>
            <?php endif; ?>
            <?= $this->Html->link(__('Delete'), ['action' => 'delete', $product['id']], ['class' => 'btn btn-sm btn-danger']) ?>
        </td>
    </tr> -->
<?php endforeach; ?>
</table>
