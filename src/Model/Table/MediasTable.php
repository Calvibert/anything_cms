<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class MediasTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    /**
     * $options possible elements:
     * objectTable
     * objectId
     * description
     */
    public function savePhpUpload($data, $options = [])
    {
        $result = $this->saveFile($data, 'img/'.$options['objectTable'].'/');
        if (!$result) {
            return false;
        }

        $entity = $this->newEntity();
        $entity->source = $options['objectTable'] .'/'. $data['name'];
        $entity->object_table = $options['objectTable'];
        $entity->object_id = $options['objectId'];
        $entity->description = $options['description'];
        $this->save($entity);
    }

    public function getMedia(&$object, $table)
    {
        $image = $this->find('all')->where([
            'object_table' => $table,
            'object_id' => $object['id']
        ])->first();

        $object['image'] = $image['source'];
        if (empty($image)) {
            $object['image'] = 'products/coming-soon.jpg';
        }
    }

    private function saveFile($data, $path)
    {
        $tmpName = $data['tmp_name'];
        $finalName = $data['name'];
        if (move_uploaded_file($tmpName, $path.$finalName)) {
            return true;
        }
        return false;
    }
}
