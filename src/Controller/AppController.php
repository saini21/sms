<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Number;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $responseCode = SUCCESS_CODE;
    public $responseMessage = "";
    public $responseData = [];
    public $currentPage = 0;
    public $authUserId = 0;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');

        $this->loadComponent('Auth', ['userModel' => 'Users', 'authenticate' => ['Form' => ['fields' => ['username' => 'email', 'password' => 'password']]], 'loginAction' => ['controller' => 'Users', 'action' => 'login'], 'loginRedirect' => ['controller' => 'Users', 'action' => 'dashboard'], 'logoutRedirect' => ['controller' => 'Users', 'action' => 'home'],]);

        $loggedInUser = $this->Cookie->read('loggedInUser');

        if (!empty($loggedInUser) && !$this->Auth->user()) {
            $this->Auth->setUser($loggedInUser);
            $this->redirect($this->Auth->redirectUrl());
        }

        if ($this->Auth->user()) {
            $this->set('authUser', $this->Auth->user());
        } else {
            $this->viewBuilder()->setLayout('home');
        }

        $this->setOptions();
    }


    public function beforeFilter(Event $event) {
        /*
         * This is used to redirect the user if admin is login and want to access the user site
         */
        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'Admin') {
            return $this->redirect(['controller' => 'Admins', 'action' => 'dashboard', 'prefix' => 'admin']);
        }
    }


    public function responseFormat() {
        $returnArray = ["code" => $this->responseCode, "message" => $this->responseMessage,];
        if ($this->currentPage > 0) {
            $this->responseData['currentPage'] = $this->currentPage;
        }

        if (isset($this->responseData['total'])) {
            $this->responseData['pages'] = ceil($this->responseData['total'] / PAGE_LIMIT);
        }

        $returnArray['data'] = !empty($this->responseData) ? $this->responseData : ['message' => 'Data not found'];

        return json_encode($returnArray);
    }

    public function getErrorMessage($errors, $show = false, $field = []) {
        if (is_array($errors)) {
            foreach ($errors as $key => $error) {
                $field[$key] = "[" . $key . "]";
                $this->getErrorMessage($error, $show, $field);
                break;
            }
        } else {
            $this->responseMessage = ($show) ? implode(" >> ", $field) . " >> " . $errors : $errors;
        }
    }

    public function getCurrentPage() {
        $this->currentPage = (!empty($this->request->query['page']) && $this->request->query['page'] > 0) ? $this->request->query['page'] : 1;
        return $this->currentPage;
    }

    public function getOption($name) {
        $this->loadModel('Options');

        $option = $this->Options->find('all')->where(['option_name' => $name])->first();

        return (empty($option)) ? "Not Found" : (empty($option->option_value)) ? $option->default_value : $option->option_value;
    }

    public function setOptions() {
        $this->loadModel('Options');

        $optionsQuery = $this->Options->find('all')->where(['category' => 'General'])->all();

        $options = [];

        foreach ($optionsQuery as $o) {
            $options[$o->option_name] = (empty($o->option_value)) ? $o->default_value : $o->option_value;
        }

       // pr($options); die;

        $this->set('options', $options);
    }
    
    public function earningStats($userId = null){
        $this->loadModel('Subscriptions');
        $this->loadModel('SentMessages');
    
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
        
        $this->set('activityStats', $activityStats);
        
        return $activityStats;
    }
}
