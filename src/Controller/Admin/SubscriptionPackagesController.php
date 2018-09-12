<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * SubscriptionPackages Controller
 *
 * @property \App\Model\Table\SubscriptionPackagesTable $SubscriptionPackages
 *
 * @method \App\Model\Entity\SubscriptionPackage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubscriptionPackagesController extends AppController {
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $subscriptionPackages = $this->paginate($this->SubscriptionPackages);
        
        $this->set(compact('subscriptionPackages'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Subscription Package id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $subscriptionPackage = $this->SubscriptionPackages->get($id, [
            'contain' => ['Subscriptions']
        ]);
        
        $this->set('subscriptionPackage', $subscriptionPackage);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $subscriptionPackage = $this->SubscriptionPackages->newEntity();
        if ($this->request->is('post')) {
            $subscriptionPackage = $this->SubscriptionPackages->patchEntity($subscriptionPackage, $this->request->getData());
            if ($this->SubscriptionPackages->save($subscriptionPackage)) {
                $this->Flash->success(__('The subscription package has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subscription package could not be saved. Please, try again.'));
        }
        $this->set(compact('subscriptionPackage'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Subscription Package id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $subscriptionPackage = $this->SubscriptionPackages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subscriptionPackage = $this->SubscriptionPackages->patchEntity($subscriptionPackage, $this->request->getData());
            if ($this->SubscriptionPackages->save($subscriptionPackage)) {
                $this->Flash->success(__('The subscription package has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subscription package could not be saved. Please, try again.'));
        }
        $this->set(compact('subscriptionPackage'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Subscription Package id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $subscriptionPackage = $this->SubscriptionPackages->get($id);
        if ($this->SubscriptionPackages->delete($subscriptionPackage)) {
            $this->Flash->success(__('The subscription package has been deleted.'));
        } else {
            $this->Flash->error(__('The subscription package could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
