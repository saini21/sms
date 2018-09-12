<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MessageCategories Controller
 *
 * @property \App\Model\Table\MessageCategoriesTable $MessageCategories
 *
 * @method \App\Model\Entity\MessageCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessageCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $messageCategories = $this->paginate($this->MessageCategories);

        $this->set(compact('messageCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Message Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $messageCategory = $this->MessageCategories->get($id, [
            'contain' => ['Messages']
        ]);

        $this->set('messageCategory', $messageCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $messageCategory = $this->MessageCategories->newEntity();
        if ($this->request->is('post')) {
            $messageCategory = $this->MessageCategories->patchEntity($messageCategory, $this->request->getData());
            if ($this->MessageCategories->save($messageCategory)) {
                $this->Flash->success(__('The message category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message category could not be saved. Please, try again.'));
        }
        $this->set(compact('messageCategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Message Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $messageCategory = $this->MessageCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $messageCategory = $this->MessageCategories->patchEntity($messageCategory, $this->request->getData());
            if ($this->MessageCategories->save($messageCategory)) {
                $this->Flash->success(__('The message category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message category could not be saved. Please, try again.'));
        }
        $this->set(compact('messageCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Message Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $messageCategory = $this->MessageCategories->get($id);
        if ($this->MessageCategories->delete($messageCategory)) {
            $this->Flash->success(__('The message category has been deleted.'));
        } else {
            $this->Flash->error(__('The message category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
