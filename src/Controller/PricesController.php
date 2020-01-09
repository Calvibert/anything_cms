<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Model\Entity\Post;

class PricesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Prices');
        $this->Tools->requireAdmin();
    }

    public function add($objectId, $objectTable)
    {
        if (empty($objectId)) {
            return $this->redirect(['controller' => $objectTable, 'action' => 'index']);
        }
        if ($this->request->is('post')) {
            $prices = $this->request->getData('price');
            sort($prices);
            foreach ($prices as $i => $price) {
                $priceEntity = $this->Prices->newEntity();
                $priceEntity->price = $price;
                $priceEntity->object_id = $objectId;
                $priceEntity->object_table = $objectTable;
                $priceEntity->tier_order = $i + 1;
                $this->Prices->save($priceEntity);
            }

            return $this->redirect(['controller' => $objectTable, 'action' => 'view', $objectId]);
        }

        $this->set('objectId', $objectId);
        $this->set('objectTable', $objectTable);
    }

    public function edit($objectId, $objectTable)
    {
        $prices = $this->Prices->find('all')
            ->where([
                'object_id' => $objectId,
                'object_table' => $objectTable
            ])->toArray();

        if (empty($prices)) {
            return $this->redirect(['action' => 'add', $objectId, $objectTable]);
        }

        if ($this->request->is('post')) {
            // var_dump($this->request->getData());die();
            $this->Prices->removeEntries($objectId, $objectTable);

            $newPrices = $this->request->getData('price');
            sort($prices);
            foreach ($newPrices as $i => $price) {
                $priceEntity = $this->Prices->newEntity();
                $priceEntity->price = $price;
                $priceEntity->object_id = $objectId;
                $priceEntity->object_table = $objectTable;
                $priceEntity->tier_order = $i + 1;
                $this->Prices->save($priceEntity);
            }
        }

        $this->set('objectId', $objectId);
        $this->set('objectTable', $objectTable);
        $this->set('prices', $prices);
    }
}
