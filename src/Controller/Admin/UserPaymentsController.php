<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * UserPayments Controller
 *
 * @property \App\Model\Table\UserPaymentsTable $UserPayments
 *
 * @method \App\Model\Entity\UserPayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserPaymentsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = ['contain' => ['Users']];
        $userPayments = $this->paginate($this->UserPayments);

        $this->set(compact('userPayments'));
    }

    /**
     * View method
     *
     * @param string|null $id User Payment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $userPayment = $this->UserPayments->get($id, ['contain' => ['Users']]);

        $this->set('userPayment', $userPayment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $userPayment = $this->UserPayments->newEntity();
        if ($this->request->is('post')) {
            $userPayment = $this->UserPayments->patchEntity($userPayment, $this->request->getData());
            if ($this->UserPayments->save($userPayment)) {
                $this->Flash->success(__('The user payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user payment could not be saved. Please, try again.'));
        }
        $users = $this->UserPayments->Users->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'limit' => 200])
        ->select(['name'=>'concat(first_name, \' \', last_name)',
            'id']);
        $this->set(compact('userPayment', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Payment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $userPayment = $this->UserPayments->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userPayment = $this->UserPayments->patchEntity($userPayment, $this->request->getData());
            if ($this->UserPayments->save($userPayment)) {
                $this->Flash->success(__('The user payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user payment could not be saved. Please, try again.'));
        }
        $users = $this->UserPayments->Users->find('list', ['limit' => 200]);
        $this->set(compact('userPayment', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $userPayment = $this->UserPayments->get($id);
        if ($this->UserPayments->delete($userPayment)) {
            $this->Flash->success(__('The user payment has been deleted.'));
        } else {
            $this->Flash->error(__('The user payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
