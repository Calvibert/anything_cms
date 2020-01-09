<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Model\Entity\Post;

class CampaignsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Campaigns');
        $this->loadModel('Products');
        $this->Tools->requireAdmin();
    }

    public function index()
    {
        $this->set('campaigns');
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $productId = $this->Products->getProductByName($this->request->getData('products'))['id'];
            $campaignEntity = $this->Campaigns->newEntity($this->request->getData());
            $campaignEntity->listed_by = $this->Auth->user('id');
            $campaignEntity->product_id = $productId;
            $this->Campaigns->save($campaignEntity);

            return $this->redirect(['action' => 'index']);
        }
    }

    public function search()
    {
        $this->viewBuilder()->layout('ajax');

        $key = $this->request->getQuery('key');
        if ($this->request->is('post')) {
            $key = $this->request->getData('key');
        }

        $results = $this->Campaigns->find('all')->where([
            'name LIKE "%'.$key.'%"',
            'description LIKE "%'.$key.'%"',
        ])->toArray();

        $this->set('campaigns', $results);
    }
}
