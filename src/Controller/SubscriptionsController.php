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
        pr($_REQUEST);
        //file_put_contents(WWW_ROOT . 'response.txt', print_r($_REQUEST, true));
        
        die;
    }
}
