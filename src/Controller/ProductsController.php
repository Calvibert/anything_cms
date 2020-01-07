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
        $this->loadModel('Medias');
        $this->Auth->allow(['search', 'searchadmin']);
    }

    public function index()
    {
        $this->set('Products');
    }

    public function add()
    {
        $this->Tools->requireAdmin();

        if ($this->request->is('post')) {
            $productEntity = $this->Products->newEntity($this->request->getData());
            $productEntity->listed_by = $this->Auth->user('id');
            $productEntity = $this->Products->save($productEntity);

            if (!empty($this->request->getData('photo')['size'])) {
                $this->Medias->savePhpUpload($this->request->getData('photo'), [
                    'objectId' => $productEntity['id'],
                    'objectTable' => 'products'
                ]);
            }

            return $this->redirect(['controller' => 'PriceTiers', 'action' => 'add', $productEntity->id]);
        }
    }

    public function view($id)
    {
        $this->Tools->requireAdmin();

        $this->set('product', $this->Products->find('all')->where(['id' => $id])->contain('PriceTiers')->first());
    }

    public function search()
    {
        $this->viewBuilder()->setLayout('ajax');

        $this->session->write('product-search-key', $this->request->getQuery('key'));
        $products = $this->Products->search($this->request->getQuery('key'));

        $this->set('products', $products);
    }

    public function searchadmin()
    {
        $this->viewBuilder()->setLayout('ajax');

        $this->session->write('product-searchadmin-key', $this->request->getQuery('key'));
        $products = $this->Products->search($this->request->getQuery('key'));

        $this->set('products', $products);
    }
}
