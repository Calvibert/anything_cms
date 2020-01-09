<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

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
}