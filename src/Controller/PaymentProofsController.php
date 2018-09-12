<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentProofs Controller
 *
 * @property \App\Model\Table\PaymentProofsTable $PaymentProofs
 *
 * @method \App\Model\Entity\PaymentProof[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentProofsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $paymentProofs = $this->paginate($this->PaymentProofs);

        $this->set(compact('paymentProofs'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment Proof id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentProof = $this->PaymentProofs->get($id, [
            'contain' => []
        ]);

        $this->set('paymentProof', $paymentProof);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentProof = $this->PaymentProofs->newEntity();
        if ($this->request->is('post')) {
            $paymentProof = $this->PaymentProofs->patchEntity($paymentProof, $this->request->getData());
            if ($this->PaymentProofs->save($paymentProof)) {
                $this->Flash->success(__('The payment proof has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment proof could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentProof'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Proof id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentProof = $this->PaymentProofs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentProof = $this->PaymentProofs->patchEntity($paymentProof, $this->request->getData());
            if ($this->PaymentProofs->save($paymentProof)) {
                $this->Flash->success(__('The payment proof has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment proof could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentProof'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Proof id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentProof = $this->PaymentProofs->get($id);
        if ($this->PaymentProofs->delete($paymentProof)) {
            $this->Flash->success(__('The payment proof has been deleted.'));
        } else {
            $this->Flash->error(__('The payment proof could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
