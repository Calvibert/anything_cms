<h1>Add</h1>

<?= $this->element('Components/form', [
    'url' => $this->Url->build(['action' => 'add']),
    'method' => 'POST',
    'fields' => [
        'name' => 'text',
        'recurring' => 'checkbox',
        'description' => 'textarea',
        'start' => 'date',
        'end' => 'date'
    ],
    'defaults' => [
        'start' => date("Y-m-d", strtotime("+1 day")),
        'end' => date("Y-m-d", strtotime("+1 week +1 day"))
    ]
]) ?>
