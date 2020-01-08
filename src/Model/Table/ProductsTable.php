<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

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

        foreach ($products as &$product) {
            $this->getAssociatedImage($product);
        }

        return $products;
    }

    private function getAssociatedImage(&$product)
    {
        $image = TableRegistry::get('Medias')->find('all')->where([
            'object_table' => 'products',
            'object_id' => $product['id']
        ])->first();

        $product['image'] = $image['source'];
        if (empty($image['source'])) {
            $product['image'] = 'products/coming-soon.jpg';
        }
    }
}
