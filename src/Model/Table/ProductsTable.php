<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ProductsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

        $this->hasMany('PriceTiers');
    }

    public function search($key)
    {
        $products = $this->find('all')->where([
            'or' => [
                'title LIKE "%'.$key.'%"',
                'model_part LIKE "%'.$key.'%"',
                'description LIKE "%'.$key.'%"'
            ]
        ])->toArray();

        return $products;
    }
}
