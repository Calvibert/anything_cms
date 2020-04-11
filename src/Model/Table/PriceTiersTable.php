<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class PriceTiersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function saveTiers($data)
    {
        for ($i = 1; $i < 4; ++$i) {
            $this->saveTier($data, $i);
        }

        return 0;
    }

    public function saveTier($data, $index)
    {
        $entity = $this->newEntity($data);
        $entity->price = $data['price'.$index];
        $entity->qty = $data['qty'.$index];
        return $this->save($entity);
    }




    public function removeEntries($objectId, $objectTable)
    {
        $this->deleteAll([
            'object_id' => $objectId,
            'object_table' => $objectTable
        ]);
    }

    public function getPrices(&$object, $objectTable)
    {
        $prices = $this->find('all')
            ->select(['price', 'tier_order', 'amount'])
            ->where([
                'object_id' => $object['id'],
                'object_table' => $objectTable
            ])
            ->order(['amount' => 'ASC'])
            ->toArray();

        $object['prices'] = $prices;
    }
}