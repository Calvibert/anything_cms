<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class PostsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

        $this->hasMany('Authors', [
            'foreignKey' => 'author_id',
            'propertyName' => 'Authors',
            'dependent' => false
        ]);
    }

    public function search($key)
    {
        $posts = $this->find('all')->where([
            'or' => [
                'title LIKE "%'.$key.'%"',
                'content LIKE "%'.$key.'%"'
            ]
        ])->toArray();

        return $posts;
    }
}
