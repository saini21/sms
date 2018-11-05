<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Subscriptions Controller
 *
 * @property \App\Model\Table\SubscriptionsTable $Subscriptions
 *
 * @method \App\Model\Entity\Subscription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubscriptionsController extends AppController {
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['paytmReceiver']);
    }
    
    public function paytm() {
        $this->viewBuilder()->setLayout('paytm');
        $params["MID"] = PAYTM_MERCHANT_MID;
        $params["ORDER_ID"] = $this->request->data['ORDER_ID'];
        $params["CUST_ID"] = $this->request->data['CUST_ID'];
        $params["INDUSTRY_TYPE_ID"] = $this->request->data['INDUSTRY_TYPE_ID'];
        $params["CHANNEL_ID"] = $this->request->data['CHANNEL_ID'];
        $params["TXN_AMOUNT"] = $this->request->data['TXN_AMOUNT'];
        $params["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
        
        $this->loadComponent('Paytm');
        
        $checkSum = $this->Paytm->getChecksumFromArray($params, PAYTM_MERCHANT_KEY);
        
        $this->set('checkSum', $checkSum);
        $this->set('params', $params);
    }
    
    public function paytmReceiver() {
        
        if ($this->Auth->user('has_plan')) {
            $this->Flash->warning(__('Wrong place, your subscription package has already been activated.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
        }
        
        $response = $_REQUEST;
        
        
        /*$response = [
            'ORDERID' => 'EWS_1_2',
            'MID' => 'Earnwi29994223681667',
            'TXNID' => '20181025111212800110168886400021271',
            'TXNAMOUNT' => '1.00',
            'PAYMENTMODE' => 'PPI',
            'CURRENCY' => 'INR',
            'TXNDATE' => '2018-10-25 11:24:20.0',
            'STATUS' => 'TXN_SUCCESS',
            'RESPCODE' => '01',
            'RESPMSG' => 'Txn Success',
            'GATEWAYNAME' => 'WALLET',
            'BANKTXNID' => '5722032',
            'BANKNAME' => 'WALLET',
            'CHECKSUMHASH' => '1QTr9RDwNRJ32J/JhfPuSi5PVUTHeK+WnbiN9cIXrz1fGKp8ViZJ4ZnN133HH7I+1auddTQdvOMbkRrXpzBHDbAPlIakzHiUAxYq4Ticv6Y=',
            'timezone' => 'Asia/Kolkata',
            'cpsession' => 'earnwith:ZomSa6aACOVsiSLq,7ce089f0be652ce2204809ff489be439',
            'CAKEPHP' => 'bfbdff31ecb5cd51ccc16338527b8d7a'
        ];*/
        
        
        if ($response['STATUS'] == 'TXN_SUCCESS') {
            
            $subscriptionPackageId = explode("_", $response['ORDERID'])[1];
            
            $subscription = $this->Subscriptions->find('all')->where(['Subscriptions.user_id' => $this->Auth->user('id')])->first();
            
            if (empty($subscription)) {
                $subscription = $this->Subscriptions->newEntity();
            }
            
            $subscription->user_id = $this->Auth->user('id');
            $subscription->subscription_package_id = $subscriptionPackageId;
            $subscription->status = 1;
            $subscription->response = json_encode($response);
            
            if ($this->Subscriptions->save($subscription)) {
                $this->loadModel('Users');
                $user = $this->Users->findById($this->Auth->user('id'))->first();
                $user->has_plan = 1;
                $this->Users->save($user);
                $this->Auth->setUser($user);
                
            }
            
            $this->Flash->success(__('Thank you, your subscription package has been activated.'));
        } else {
            $this->Flash->error(__('Payment process has been failed, please try again.'));
        }
        
        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
    }
    
    public function subscribe($packageId = null) {
        
        $this->loadModel('SubscriptionPackages');
        
        $package = $this->SubscriptionPackages->find('all')->where(['id' => $packageId])->first();
        
        $this->set('package', $package);
        
        $paytmNumber = $this->getOption('payment_receiver_mobile_number');
        $this->set('paytmNumber', $paytmNumber);
    }
    
    //ALTER TABLE  `users` ADD  `payment_made` TINYINT( 1 ) NOT NULL DEFAULT  '0' AFTER  `has_plan` ;
    public function subscribeApi() {
        
        if ($this->Auth->user('has_plan')) {
            $this->Flash->warning(__('Wrong place, your subscription package has already been activated.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
        }
        
        $data = $this->request->data;
        
        $subscription = $this->Subscriptions->newEntity();
        $subscription->user_id = $this->Auth->user('id');
        $subscription->subscription_package_id = base64_decode($data['p']);
        $subscription->response = $data['response'];
        $subscription->status = 0;
        if ($this->Subscriptions->save($subscription)) {
            $this->loadModel('Users');
            $user = $this->Users->findById($this->Auth->user('id'))->first();
            $user->payment_made = 1;
            $this->Users->save($user);
            $this->Auth->setUser($user);
            $this->Flash->success(__('Thank you, your subscription package will be activated with 24 hours.'));
        } else {
            $this->Flash->success(__('Something went wrong, please try again.'));
        }
    
        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
    }
}
