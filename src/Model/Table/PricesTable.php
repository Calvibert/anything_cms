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
}