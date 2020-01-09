<h1>Add</h1>

<?= $this->element('Components/form', [
    'url' => $this->Url->build(['action' => 'add']),
    'method' => 'POST',
    'fields' => [
        'author' => 'text',
        'title' => 'text',
        'content' => 'textarea'
    ]
]) ?>