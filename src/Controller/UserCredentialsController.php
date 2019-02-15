<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserCredentials Controller
 *
 * @property \App\Model\Table\UserCredentialsTable $UserCredentials
 *
 * @method \App\Model\Entity\UserCredential[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserCredentialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $userCredentials = $this->paginate($this->UserCredentials);

        $this->set(compact('userCredentials'));
    }

    /**
     * View method
     *
     * @param string|null $id User Credential id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userCredential = $this->UserCredentials->get($id, [
            'contain' => []
        ]);

        $this->set('userCredential', $userCredential);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userCredential = $this->UserCredentials->newEntity();
        if ($this->request->is('post')) {
            $userCredential = $this->UserCredentials->patchEntity($userCredential, $this->request->getData());
            if ($this->UserCredentials->save($userCredential)) {
                $this->Flash->success(__('The user credential has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user credential could not be saved. Please, try again.'));
        }
        $this->set(compact('userCredential'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Credential id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userCredential = $this->UserCredentials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userCredential = $this->UserCredentials->patchEntity($userCredential, $this->request->getData());
            if ($this->UserCredentials->save($userCredential)) {
                $this->Flash->success(__('The user credential has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user credential could not be saved. Please, try again.'));
        }
        $this->set(compact('userCredential'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Credential id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userCredential = $this->UserCredentials->get($id);
        if ($this->UserCredentials->delete($userCredential)) {
            $this->Flash->success(__('The user credential has been deleted.'));
        } else {
            $this->Flash->error(__('The user credential could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
