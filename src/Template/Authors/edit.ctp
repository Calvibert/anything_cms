<h1>Edit</h1>

<?= $this->element('Components/form', [
    'url' => $this->Url->build(['action' => 'edit', $author['id']]),
    'method' => 'post',
    'fields' => [
        'first_name' => 'text',
        'last_name' => 'text',
        'alias' => 'text',
        'date_of_birth' => 'dateofbirth',
        'about' => 'textarea'
    ],
    'defaults' => $author
]) ?>