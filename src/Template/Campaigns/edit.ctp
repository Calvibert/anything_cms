<h1>Edit Campaign <?= $campaign['name'] ?></h1>

<a href="<?= $this->Url->build() ?>">Edit Prices</a>

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