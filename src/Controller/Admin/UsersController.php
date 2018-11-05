<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\I18n\Number;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $users = $this->paginate($this->Users);
        
        $this->set(compact('users'));
    }
    
    public function activitiesUsers() {
        $users = $this->paginate($this->Users);
        
        $this->set(compact('users'));
    }
    
    public function activities($userId = null) {
        
        $this->loadModel('SentMessages');
        $sentMessages = $this->SentMessages->find('all')->where(['SentMessages.user_id' => $userId])->contain(['Users' => function ($q) {
            return $q->select(['Users.id', 'Users.first_name', 'Users.last_name', 'Users.email']);
        }])->hydrate(false);
        
        $this->loadModel('Users');
        $this->loadModel('Subscriptions');
        
        $user = $this->Users->find('all')->where(['Users.id' => $userId])->first();
        
        $subscription = $this->Subscriptions->find('all')->where(['Subscriptions.user_id' => $userId])->contain(['SubscriptionPackages'])->first();
        
        $correctSmsCount = $this->SentMessages->find('all')->where(['SentMessages.user_id' => $userId, 'SentMessages.approved' => 1])->count();
        $duplicateSmsCount = $this->SentMessages->find('all')->where(['SentMessages.user_id' => $userId, 'SentMessages.is_duplicate' => true])->count();
        $rejectedSmsCount = $this->SentMessages->find('all')->where(['SentMessages.user_id' => $userId, 'SentMessages.approved' => 2, 'SentMessages.is_duplicate' => false])->count();
        
        $duplicateSmsPenalty = $this->getOption('duplicate_sms_penalty');
        $rejectedSmsPenalty = $this->getOption('rejected_sms_penalty');
        
        $correctSmsMoney = ($correctSmsCount * $subscription->subscription_package->earn_per_sms) / 100;
        $duplicateSmsMoney = $duplicateSmsCount * $duplicateSmsPenalty;
        $rejectedSmsMoney = $rejectedSmsCount * $rejectedSmsPenalty;
        $totalSmsMoney = $correctSmsMoney - $duplicateSmsMoney - $rejectedSmsMoney;
        $totalSmsCount = $correctSmsCount + $duplicateSmsCount + $rejectedSmsCount;
        
        $activityStats = [
            [
                'type' => 'Correctly Send SMS',
                'count' => $correctSmsCount,
                'money' => "Rs. " . Number::precision($correctSmsMoney, 2) . "/-"
            ],
            [
                'type' => 'Duplicate SMS',
                'count' => $duplicateSmsCount,
                'money' => "Rs. " . Number::precision($duplicateSmsMoney, 2) . "/-"
            ],
            [
                'type' => 'Rejected SMS',
                'count' => $rejectedSmsCount,
                'money' => "Rs. " . Number::precision($rejectedSmsMoney, 2) . "/-"
            ],
            [
                'type' => 'Total',
                'count' => $totalSmsCount,
                'money' => "Rs. " . Number::precision($totalSmsMoney, 2) . (($totalSmsMoney > 0) ? "/- Earning" : "/- Penalty")
            ]
        ];
        
        
        $activities = $this->paginate($sentMessages);
        
        $this->set(compact('activities', 'user', 'activityStats'));
    }
    
    
    
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['SentMessages', 'Subscriptions']
        ]);
        
        $this->set('user', $user);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}

