<h1>Add</h1>

<?= $this->element('Components/form', [
    'url' => $this->Url->build(['action' => 'add']),
    'method' => 'POST',
    'fields' => [
        'name' => 'text',
        'recurring' => 'checkbox',
        'description' => 'textarea',
        'start' => 'date',
        'end' => 'date',
        'product' => [
            'type' => 'autofill',
            'field' => 'products'
        ],
        'price1' => 'number',
        'qty_price1' => 'number',
        'price2' => 'number',
        'qty_price2' => 'number',
        'price3' => 'number',
        'qty_price3' => 'number',
    ],
    'defaults' => [
        'start' => date("Y-m-d", strtotime("+1 day")),
        'end' => date("Y-m-d", strtotime("+1 week +1 day"))
    ]
]) ?>
