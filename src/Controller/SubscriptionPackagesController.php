<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * SubscriptionPackages Controller
 *
 * @property \App\Model\Table\SubscriptionPackagesTable $SubscriptionPackages
 *
 * @method \App\Model\Entity\SubscriptionPackage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubscriptionPackagesController extends AppController {
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['plans']);
    }
    
    /**
     * plans method
     *
     * @return \Cake\Http\Response|void
     */
    public function plans() {
        $this->viewBuilder()->setLayout('home');
        $subscriptionPackages = $this->paginate($this->SubscriptionPackages);

        $paytmNumber = $this->getOption('payment_receiver_mobile_number');
        $this->set('paytmNumber', $paytmNumber);
        
        $this->set(compact('subscriptionPackages'));
    }

}
