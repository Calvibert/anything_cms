<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Model\Entity\Post;

class PriceTiersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('PriceTiers');
        $this->Tools->requireAdmin();
    }

    public function add($productId)
    {
        if (empty($productId)) {
            return $this->redirect(['controller' => 'Products', 'action' => 'index']);
        }
        if ($this->request->is('post')) {
            $prices = $this->request->getData('price');
            sort($prices);
            foreach ($prices as $i => $price) {
                $ptEntity = $this->PriceTiers->newEntity();
                $ptEntity->price = $price;
                $ptEntity->product_id = $productId;
                $ptEntity->tier_order = $i + 1;
                $this->PriceTiers->save($ptEntity);
            }

            return $this->redirect(['controller' => 'Products', 'action' => 'view', $productId]);
        }

        $this->set('productId', $productId);
    }
}
