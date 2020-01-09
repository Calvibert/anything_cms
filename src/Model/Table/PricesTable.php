<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class PricesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
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