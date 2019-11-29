<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Model\Entity\Post;

class PostsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Posts');
    }

    public function index()
    {

    }

    public function add()
    {
        if ($this->request->is('post')) {
            $postEntity = $this->Posts->newEntity($this->request->getData());
            $this->Posts->save($postEntity);

            return $this->redirect(['action' => 'index']);
        }
    }

    public function edit($id)
    {
        $this->set('post', $this->Posts->find('all')->where(['id' => $id])->first());

        if ($this->request->is('post')) {
            $postEntity = $this->Posts->get($id);
            $postEntity->author = $this->request->getData('author');
            $postEntity->title = $this->request->getData('title');
            $postEntity->content = $this->request->getData('content');
            $this->Posts->save($postEntity);

            return $this->redirect(['action' => 'index']);
        }
    }

    public function disable($id)
    {
        $postEntity = $this->Posts->get($id);
        $postEntity->active = !$postEntity->active;
        $this->Posts->save($postEntity);
        return $this->redirect(['action' => 'index']);
    }

    public function search()
    {
        $this->viewBuilder()->setLayout('ajax');

        $this->session->write('post-search-key', $this->request->getQuery('key'));
        $posts = $this->Posts->search($this->request->getQuery('key'));

        $this->set('posts', $posts);
    }
}
