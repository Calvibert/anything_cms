<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Model\Entity\Author;

class AuthorsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Authors');
    }

    public function index()
    {

    }

    public function add()
    {
        if ($this->request->is('post')) {
            $authorData = $this->Authors->newEntity($this->request->getData());
            $this->Authors->save($authorData);

            return $this->redirect(['action' => 'index']);
        }
    }

    public function edit($id)
    {
        $this->set('author', $this->Authors->find('all')->where(['id' => $id])->first());

        if ($this->request->is('post')) {
            $authorEntity = $this->Authors->get($id);
            $authorEntity->first_name = $this->request->getData('first_name');
            $authorEntity->last_name = $this->request->getData('last_name');
            $authorEntity->alias = $this->request->getData('alias');
            $authorEntity->date_of_birth = $this->request->getData('date_of_birth');
            $authorEntity->about = $this->request->getData('about');
            $this->Authors->save($authorEntity);

            return $this->redirect(['action' => 'index']);
        }
    }

    public function disable($id)
    {
        $authorEntity = $this->Authors->get($id);
        $authorEntity->active = !$authorEntity->active;
        $this->Authors->save($authorEntity);
        return $this->redirect(['action' => 'index']);
    }

    public function search()
    {
        $this->viewBuilder()->setLayout('ajax');

        $this->session->write('author-search-key', $this->request->getQuery('key'));
        $authors = $this->Authors->search($this->request->getQuery('key'));

        $this->set('authors', $authors);
    }

    public function delete($id)
    {
        $authorEntity = $this->Authors->get($id);
        $this->Authors->delete($authorEntity);

        return $this->redirect(['action' => 'index']);
    }

    public function autocomplete()
    {
        $this->viewBuilder()->setLayout('ajax');

        $authors = $this->Authors->search($this->request->getQuery('key'), ['id', 'first_name', 'last_name', 'alias']);

        $this->set('authors', $authors);
    }
}
