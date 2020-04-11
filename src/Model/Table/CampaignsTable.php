<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Collection\Collection;

class CampaignsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

        $this->hasMany('Prices');
    }

    public function getCampaign(&$object, $table)
    {
        $campaign = $this->find('all')
            ->where([
                'object_id' => $object['id'],
                'object_table' => $table
            ])
            ->first();

        TableRegistry::get('Prices')->getPrices($campaign, 'campaigns');

        $object['campaign'] = $campaign;
    }

    public function getPopular($amount)
    {
        $campaigns = $this->find('all')
            ->select(['COUNT(Commits.id)', '*'])
            ->where([
                'start < ' => date('Y-m-d H:i:s'),
                'end > ' => date('Y-m-d H:i:s')
            ])
            ->contain('Commits')
            ->order(['COUNT(Commits)' => 'DESC'])
            ->limit($amount)
            ->toArray();

        return $campaigns;
    }
}
