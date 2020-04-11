<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Model\Entity\Post;

class CommitsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Commits');
        $this->Tools->requireAdmin();
    }

    public function index()
    {
        $this->set('commits');
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $entity = $this->Commits->newEntity($this->request->getData(''));
            $this->save($entity);
        }
    }
}
