<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class AuthorsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function search($key, $fields = null)
    {
        $key = explode(' ', $key);
        $conditions = [];
        foreach ($key as $part) {
            $conditions[] = 'first_name LIKE "%'.$part.'%"';
            $conditions[] = 'last_name LIKE "%'.$part.'%"';
            $conditions[] = 'alias LIKE "%'.$part.'%"';
            $conditions[] = 'about LIKE "%'.$part.'%"';
        }

        $authors = $this->find('all')->where([
            'or' => $conditions
        ]);

        if (!empty($fields)) {
            $authors->select($fields);
        }

        return $authors->toArray();
    }
}
