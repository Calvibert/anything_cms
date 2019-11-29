<h1>Edit</h1>

<?= $this->element('Components/form', [
    'url' => $this->Url->build(['action' => 'edit', $post['id']]),
    'method' => 'post',
    'fields' => [
        'title' => 'text',
        'authors' => 'text',
        'content' => 'textarea'
    ],
    'defaults' => $post,
    'autocompletes' => [
        'authors'
    ]
]) ?>