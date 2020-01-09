<h1>Edit Campaign <?= $campaign['name'] ?></h1>

<a href="<?= $this->Url->build(['controller' => 'prices', 'action' => 'edit', $campaign['id'], 'campaigns']) ?>" class="btn btn-success">Edit Prices</a>

<?= $this->element('Components/form', [
    'url' => $this->Url->build(['action' => 'edit', $campaign['id']]),
    'method' => 'POST',
    'fields' => [
        'name' => 'text',
        'description' => 'textarea',
        'recurring' => 'checkbox',
        'start' => 'date',
        'end' => 'date'
    ]
]) ?>