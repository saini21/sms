<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * SentMessages Controller
 *
 * @property \App\Model\Table\SentMessagesTable $SentMessages
 *
 * @method \App\Model\Entity\SentMessage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SentMessagesController extends AppController {
    
    
    public function approveMessage() {
        
        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        if ($this->request->is('post')) {
            $sentMessage = $this->SentMessages->find('all')->where(['SentMessages.id' => $this->request->data['id']])->first();
            $sentMessage->approved = $this->request->data['approved'];
            if ($this->SentMessages->save($sentMessage)) {
                $this->responseCode = SUCCESS_CODE;
                $this->responseData['new_approved'] = $sentMessage->approved;
            }
        }
        
        echo $this->responseFormat();
    }
    
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $sentMessages = $this->paginate($this->SentMessages);
        
        $this->set(compact('sentMessages'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Sent Message id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $sentMessage = $this->SentMessages->get($id, [
            'contain' => ['Users']
        ]);
        
        $this->set('sentMessage', $sentMessage);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $sentMessage = $this->SentMessages->newEntity();
        if ($this->request->is('post')) {
            $sentMessage = $this->SentMessages->patchEntity($sentMessage, $this->request->getData());
            if ($this->SentMessages->save($sentMessage)) {
                $this->Flash->success(__('The sent message has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sent message could not be saved. Please, try again.'));
        }
        $users = $this->SentMessages->Users->find('list', ['limit' => 200]);
        $this->set(compact('sentMessage', 'users'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Sent Message id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $sentMessage = $this->SentMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sentMessage = $this->SentMessages->patchEntity($sentMessage, $this->request->getData());
            if ($this->SentMessages->save($sentMessage)) {
                $this->Flash->success(__('The sent message has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sent message could not be saved. Please, try again.'));
        }
        $users = $this->SentMessages->Users->find('list', ['limit' => 200]);
        $this->set(compact('sentMessage', 'users'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Sent Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $sentMessage = $this->SentMessages->get($id);
        if ($this->SentMessages->delete($sentMessage)) {
            $this->Flash->success(__('The sent message has been deleted.'));
        } else {
            $this->Flash->error(__('The sent message could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
