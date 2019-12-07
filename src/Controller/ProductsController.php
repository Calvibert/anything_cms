<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Model\Entity\Post;

class ProductsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Products');
        $this->Tools->requireAdmin();
    }

    public function index()
    {
        $this->set('Products');
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $productEntity = $this->Products->newEntity($this->request->getData());
            $productEntity->listed_by = 00000001;
            $this->Products->save($productEntity);

            return $this->redirect(['action' => 'index']);
        }
    }
}
