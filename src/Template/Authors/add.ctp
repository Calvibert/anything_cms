<h1>Add</h1>

<?= $this->element('Components/form', [
    'url' => $this->Url->build(['action' => 'add']),
    'method' => 'POST',
    'fields' => [
        'first_name' => 'text',
        'last_name' => 'text',
        'alias' => 'text',
        'date_of_birth' => 'dateofbirth',
        'about' => 'textarea'
    ]
]) ?>