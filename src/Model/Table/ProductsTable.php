<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class ProductsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

        $this->hasMany('Campaigns')
            ->setForeignKey('product_id');
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

    public function getAssociatedImage(&$product)
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

    public function autocomplete($key)
    {
        return $this->find('all')
            ->select(['title'])
            ->where(['title LIKE "%'.$key.'%"'])
            ->toArray();
    }

    public function getProductByName($name)
    {
        return $this->find('all')
            ->where(['title LIKE "%'.$name.'%"'])
            ->first();
    }
}
