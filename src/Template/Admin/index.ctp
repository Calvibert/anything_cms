<?php
use Cake\Core\Configure;
?>
<h1>Admin panel</h1>

<ul>
<?php foreach (Configure::read('App.objects') as $object => $state): ?>
<?php if ($state === true): ?>
<li><a href="<?= $this->Url->build(['controller' => $object, 'action' => 'index']) ?>"><?= $object ?></a></li>
<?php endif; ?>
<?php endforeach; ?>
</ul>
