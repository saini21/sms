<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {
    
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['register', 'login', 'home', 'add', 'forgotPassword', 'forgotPasswordApi', 'resetPassword', 'resetPasswordApi', 'privateCitizenApi']);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
    }
    
    public function home() {
        $this->viewBuilder()->setLayout('home');
        
        $this->loadModel('SubscriptionPackages');
        $subscriptionPackages = $this->SubscriptionPackages->find('all')->where(['SubscriptionPackages.status' => 1]);
        
        $this->loadModel('PaymentProofs');
        $paymentProofs = $this->PaymentProofs->find('all')->where(['PaymentProofs.status' => 1]);
        
        $this->set(compact('subscriptionPackages', 'paymentProofs'));
    }
    
    public function dashboard() {
        
        $this->loadModel('SentMessages');
        
        $totalActivities = $this->SentMessages->find('all')->where(['SentMessages.user_id' => $this->Auth->user('id')])->count();
        $processedActivities = $this->SentMessages->find('all')->where(['SentMessages.user_id' => $this->Auth->user('id'), 'SentMessages.approved !=' => 0])->count();
        $pendingActivities = $this->SentMessages->find('all')->where(['SentMessages.user_id' => $this->Auth->user('id'), 'SentMessages.approved' => 0])->count();
        
        $totalEarning = 0;
        
        
        $this->set(compact('totalActivities', 'processedActivities', 'pendingActivities', 'totalEarning'));
    }
    
    
    /**
     * logout method
     */
    public function logout() {
        $this->Flash->success(__('You are now logged out'));
        return $this->redirect($this->Auth->logout());
    }
    
    public function login() {
        //if already logged-in, redirect
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        
        if ($this->request->is('post') || $this->request->query('provider')) {
            
            $user = $this->Auth->identify();
            if ($user) {
                if ($this->request->data['remember_me']) {
                    $this->Cookie->write('loggedInUser', $user, true, '1 year');
                }
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
    }
    
    /**
     * Register method
     *
     * @return \Cake\Http\Response|null Redirects to Auth Redirect URL.
     */
    public function register() {
        //if already logged-in, redirect
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
    }
    
    public function add() {
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'newUser']);
            
            if ($this->Users->save($user)) {
                
                //                $options = [
                //					'template' => 'welcome',
                //					'to' => $user->email,
                //					'subject' => _('Welcome to '. SITE_TITLE),
                //					'viewVars' => [
                //						'name' => $user->first_name,
                //						'email' => $user->email
                //					]
                //				];
                //
                //				$this->loadComponent('EmailManager');
                //				$this->EmailManager->sendEmail($options);
                $this->Auth->setUser($user);
                $this->Flash->success(__('You have successfully registered.'));
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                if (is_array($user->errors())) {
                    foreach ($user->errors() as $errors) {
                        foreach ($errors as $err) {
                            $error = $err;
                        }
                    }
                }
                $this->Flash->error(__($error));
                return $this->redirect(['action' => 'register']);
            }
        }
    }
    
    
    /**
     * Reset Password  method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function resetPassword($forgotPasswordToken) {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        $this->viewBuilder()->setLayout('home');
        
        $user = $this->Users->findByForgotPasswordToken($forgotPasswordToken)->first();
        if (!empty($user)) {
            $this->set('forgotPasswordToken', $forgotPasswordToken);
        } else {
            $this->Flash->error(__('Forgot password token has been expired. Please, try again.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
    
    public function resetPasswordApi() {
        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->findByForgotPasswordToken($this->request->data['forgot_password_token'])->first();
            if ($user) {
                /*
                 * Restrict user to edit only while listed fields
                 */
                $editableFields = ['password', 'verify_password', 'forgot_password_token'];
                foreach ($this->request->data as $field => $val) {
                    if (!in_array($field, $editableFields)) {
                        unset($this->request->data[$field]);
                    }
                }
                $user['forgot_password_token'] = "";
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->responseMessage = __('Your password has been updated.');
                    $this->responseCode = SUCCESS_CODE;
                } else {
                    $this->responseMessage = __('Something went wrong. Please, try again.');
                }
            } else {
                $this->responseMessage = __('Forgot password token has been expired. Please, try again.');
            }
        }
        echo $this->responseFormat();
    }
    
    /**
     * Reset Password  method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function forgotPassword() {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->viewBuilder()->setLayout('home');
    }
    
    
    public function forgotPasswordApi() {
        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->findByEmail($this->request->data['email'])->first();
            
            if (!empty($user)) {
                $user->forgot_password_token = md5(uniqid(rand(), true));
                //$resetUrl = $this->request->scheme() . '://' . $this->request->host() . '/users/reset-password/' . $user->forgot_password_token;
                $resetUrl = SITE_URL . '/users/reset-password/' . $user->forgot_password_token;
                if ($this->Users->save($user)) {
                    $options = [
                        'template' => 'forgot_password',
                        'to' => $this->request->data['email'],
                        'subject' => _('Reset Password'),
                        'viewVars' => [
                            'name' => $user->first_name,
                            'resetUrl' => $resetUrl,
                        ]
                    ];
                    
                    $this->loadComponent('EmailManager');
                    $this->EmailManager->sendEmail($options);
                    $this->responseCode = SUCCESS_CODE;
                    $this->responseMessage = __('A link to reset the password with the instruction has been sent to your inbox');
                }
            } else {
                $this->responseCode = EMAIL_DOESNOT_REGISTERED;
                $this->responseMessage = __('Email does not exists');
            }
        }
        
        echo $this->responseFormat();
    }
    
    /**
     * View Profile method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function profile() {
        
        
        $user = $this->Users->get($this->Auth->user('id'));
        
        $user['password'] = "";
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if (empty($this->request->data['password'])) {
                unset($this->request->data['password']);
            }
            
            
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if (empty($this->request->data['password'])) {
                unset($user['password']);
            }
            
            
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Your profile has been updated.'));
                
                return $this->redirect(['action' => 'profile']);
            } else {
                //show errors
            }
            
            
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        
        $this->set(compact('user'));
    }
    
    
    public function changeProfileImage() {
        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->findById($this->Auth->user('id'))->first();
            if ($user) {
                /*
                 * Restrict user to edit only while listed fields
                 */
                $editableFields = ['profile_image'];
                foreach ($this->request->data as $field => $val) {
                    if (!in_array($field, $editableFields)) {
                        unset($this->request->data[$field]);
                    }
                }
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Auth->setUser($user);
                    $this->responseMessage = __('Profile image has been saved.');
                    $this->responseCode = SUCCESS_CODE;
                } else {
                    $this->getErrorMessage($user->errors());
                }
            } else {
                $this->responseCode = RECORD_NOT_FOUND;
                $this->responseMessage = __('User not found.');
            }
        }
        echo $this->responseFormat();
    }
}
