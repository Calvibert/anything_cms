<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class OrdersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function getOrders($userId)
    {
        $ordersQuery = $this->find('all')
            ->where(['user_id' => $userId])
            ->toArray();

        return $this->paginate($ordersQuery);
    }
}
