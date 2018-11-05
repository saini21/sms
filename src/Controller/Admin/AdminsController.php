<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Admins Controller
 *
 * @property \App\Model\Table\AdminsTable $Admins
 *
 * @method \App\Model\Entity\Admin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminsController extends AppController {
    
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['login', 'forgotPassword', 'resetPassword', 'add', 'changeStatus']);
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
    
    public function login() {
        //if already logged-in, redirect
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {
            $admin = $this->Auth->identify();
            if ($admin) {
                $this->Auth->setUser($admin);
                if (isset($this->request->getData()['xx'])) {
                    $this->Cookie->write('beltway_remembertoken', $this->encryptpass($this->request->data['email']) . "^" . base64_encode($this->request->data['password']), true);
                }
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Email or password is incorrect'));
                $this->redirect('/admin');
            }
        } elseif (empty($this->data)) {
            $rememberToken = $this->Cookie->read('beltway_remembertoken');
            if (!is_null($rememberToken)) {
                $rememberToken = explode("^", $rememberToken);
                $data = $this->Admins->find('all', ['conditions' => ['remember_token' => $rememberToken[0]]], ['fields' => ['email', 'password']])->first();
                
                $this->request->data['email'] = $data->email;
                $this->request->data['password'] = base64_decode($rememberToken[1]);
                $admin = $this->Auth->identify();
                if ($admin) {
                    $this->Auth->setUser($admin);
                    $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->redirect('/admin');
                }
            }
        }
    }
    
    public function dashboard() {
        $this->loadModel('Users');
        $this->loadModel('SentMessages');
        $this->loadModel('Messages');
        
        $totalUsers = $this->Users->find('all')->count();
        $newActivityCount = $this->SentMessages->find('all')->where(['SentMessages.approved'=>0])->count();
        $totalActivity = $this->SentMessages->find('all')->count();
        $totalMessages = $this->Messages->find('all')->count();
        
        $this->set(compact('totalUsers', 'newActivityCount', 'totalActivity', 'totalMessages'));
        
    }
    
    public function forgotPassword() {
        $this->viewBuilder()->setLayout('admin_login');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admin = $this->Admins->findByEmail($this->request->data['email'])->first();
            if (!empty($admin)) {
                $admin->forgot_password_token = md5(uniqid(rand(), true));
                if ($this->Admins->save($admin)) {
                    $options = [
                        'template' => 'forgot_password',
                        'to' => $this->request->data['email'],
                        'subject' => _('Reset Password'),
                        'from' => ['shooten@gmail.com' => SITE_TITLE],
                        'sender' => ['shooten@gmail.com' => SITE_TITLE],
                        'viewVars' => [
                            'name' => $admin->name,
                            'resetUrl' => $this->request->scheme() . '://' . $this->request->host() . '/admin/admins/reset-password/' . $admin->forgot_password_token,
                        ]
                    ];
                    
                    $this->loadComponent('EmailManager');
                    $this->EmailManager->sendEmail($options);
                    $this->Flash->success(__('A link to reset the password with the instruction has been sent to your inbox'));
                }
            } else {
                $this->Flash->error(__('Email does not exists'));
            }
            return $this->redirect(['Controller' => 'admins', 'action' => 'forgot-password']);
        }
    }
    
    public function resetPassword($forgotPasswordToken) {
        //if ($this->Auth->user()) {
        //   return $this->redirect($this->Auth->redirectUrl());
        // }
        $this->viewBuilder()->setLayout('admin_login');
        $admin = $this->Admins->findByForgotPasswordToken($forgotPasswordToken)->first();
        $isValidPasswordToken = false;
        if (!empty($admin)) {
            $this->set('isValidPasswordToken', $isValidPasswordToken);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->request->getData('password') == $this->request->getData('confirm_password')) {
                $admin->password = $this->request->getData('password');
                if ($this->Admins->save($admin)) {
                    $this->Flash->success(__('Password has been reset.'));
                    return $this->redirect(['controller' => 'admins', 'action' => 'login']);
                } else {
                    $this->Flash->error(__('Password has not been set.'));
                }
            } else {
                $this->Flash->error(__('Confirm Password does not match with Password'));
            }
        }
    }
    
    public function logout() {
        $this->Auth->logout();
        $this->request->session()->destroy();
        $this->Cookie->delete('hooty_remembertoken');
        $this->Flash->success(__('You are now logged out'));
        return $this->redirect(['controller' => 'Admins', 'action' => 'login']);
    }
    
    public function profile() {
        
        $admin = $this->Admins->get($this->Auth->user('id'));
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if (empty($this->request->getData('password'))) {
                unset($this->request->data["password"]);
            }
            $admin = $this->Admins->patchEntity($admin, $this->request->getData());
            if (empty($admin->profile_image)) {
                $admin->profile_image = "/img/user-default.png";
            }
            
            
            if ($this->Admins->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));
                $this->Auth->setUser($admin);
                
                return $this->redirect(['action' => 'profile']);
            } else {
                //pr($admin->errors()); die;
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        $this->set(compact('admin'));
    }
    
    public function changeStatus() {
        
        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        if ($this->request->is('post')) {
            $model = $this->request->data['model'];
            $field = $this->request->data['field'];
            $id = $this->request->data['id'];
            
            $this->loadModel($model);
            
            $entity = $this->$model->find('all')->where(['id' => $id])->first();
            
            $entity->$field = !$entity->$field;
            
            if ($this->$model->save($entity)) {
                if($model == "Subscriptions"){
                    $this->loadModel('Users');
                    $user = $this->Users->find('all')->where(['id'=>$entity->user_id])->first();
                    $user->has_plan = ($entity->$field)? 1 : 0;
                    $this->Users->save($user);
                }
                $this->responseCode = SUCCESS_CODE;
                $this->responseData['new_status'] = $entity->$field;
            }
        }
    
        echo $this->responseFormat();
        
    }
    
    
}
