<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Model\Entity\Post;

class CampaignsController extends AppController
{
    private $numberOfPopularCampaignsDefault = 10;

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
            $campaignId = $this->Campaigns->save($campaignEntity);

            $this->savePriceTiers($campaignId, $productId);

            return $this->redirect(['action' => 'index']);
        }
    }

    public function edit($id)
    {
        $campaign = $this->Campaigns->get($id);

        $this->set('campaign', $campaign);
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

    public function getPopular()
    {
        $this->viewBuilder()->layout('ajax');

        $popularCampaigns = $this->Campaigns->getPopular($this->numberOfPopularCampaignsDefault);

        $this->set('popularCampaigns', $popularCampaigns);
    }

    private function savePriceTiers($campaignId, $productId)
    {
        $priceTierData = $this->request->getData();
        $priceTierData['campaign_id'] = $campaignId;
        $priceTierData['product_id'] = $productId;
        return $this->PriceTiers->saveTiers($priceTierData);
    }
}
