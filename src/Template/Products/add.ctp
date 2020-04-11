<h1>Add</h1>

<?= $this->element('Components/form', [
    'url' => $this->Url->build(['action' => 'add']),
    'method' => 'POST',
    'fields' => [
        'title' => 'text',
        'model_part' => 'text',
        'description' => 'textarea',
        'photo' => 'photo',
    ],
    'defaults' => []
]) ?>
