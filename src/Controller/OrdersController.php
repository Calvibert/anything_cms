<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Model\Entity\Post;

class OrdersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Orders');
    }

    public function commit()
    {
        if ($this->request->is('post')) {
            $orderEntity = $this->Orders->newEntity($this->request->getData());
            $this->Orders->save($orderEntity);
        }
    }

    public function getUserOrders()
    {
        $this->viewBuilder()->layout('ajax');

        $orders = $this->Orders->getUserOrders($this->Auth->user('id'));

        $this->set('orders', $orders);
    }
}