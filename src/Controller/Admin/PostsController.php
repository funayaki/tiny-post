<?php
namespace TinyPost\Controller\Admin;

/**
 * Posts Controller
 *
 * @property \TinyPost\Model\Table\PostsTable $Posts
 *
 * @method \TinyPost\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $posts = $this->paginate($this->loadModel());

        $this->set(compact('posts'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setTemplate('form');

        $post = $this->loadModel()->newEntity();
        if ($this->request->is('post')) {
            $post = $this->loadModel()->patchEntity($post, $this->request->getData());
            if ($this->loadModel()->save($post)) {
                $this->Flash->success(__d('localized', 'The {0} has been saved.', $this->loadModel()->getLocalizedAlias()));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('localized', 'The {0} could not be saved. Please, try again.', $this->loadModel()->getLocalizedAlias()));
        }
        $this->set(compact('post'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setTemplate('form');

        // TODO
        $associated = [];
        foreach ($this->loadModel()->associations()->getIterator() as $association) {
            $associated[] = $association->getName();
        }

        $post = $this->loadModel()->get($id, [
            'contain' => $associated
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->loadModel()->patchEntity($post, $this->request->getData());
            if ($this->loadModel()->save($post)) {
                $this->Flash->success(__d('localized', 'The {0} has been saved.', $this->loadModel()->getLocalizedAlias()));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('localized', 'The {0} could not be saved. Please, try again.', $this->loadModel()->getLocalizedAlias()));
        }
        $this->set(compact('post'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->loadModel()->get($id);
        if ($this->loadModel()->delete($post)) {
            $this->Flash->success(__d('localized', 'The {0} has been deleted.', $this->loadModel()->getLocalizedAlias()));
        } else {
            $this->Flash->error(__d('localized', 'The {0} could not be deleted. Please, try again.', $this->loadModel()->getLocalizedAlias()));
        }

        return $this->redirect(['action' => 'index']);
    }
}
