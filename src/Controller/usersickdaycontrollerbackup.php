<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Utility\Security;

/**
 * UserSickdays Controller
 *
 * @property \App\Model\Table\UserSickdaysTable $UserSickdays
 *
 * @method \App\Model\Entity\UserSickday[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserSickdaysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['users']
        ];
        $userSickdays = $this->paginate($this->UserSickdays);

        $this->set(compact('userSickdays'));
    }

    /**
     * View method
     *
     * @param string|null $id User Sickday id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userSickday = $this->UserSickdays->get($id, [
            'contain' => ['users']
        ]);

        $this->set('userSickday', $userSickday);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userSickday = $this->UserSickdays->newEntity();
        if ($this->request->is('post')) {

            $userSickday = $this->UserSickdays->patchEntity($userSickday, $this->request->getData());
            $userSickday->user_id = $this->Auth->user('id');

            $userSickday->file = $this->upload();

            if($userSickday->file){

              if ($this->UserSickdays->save($userSickday)) {
                  $this->Flash->success(__('The user sickday has been saved.'));
                  return $this->redirect(['action' => 'index']);
              }

            $this->Flash->error(__('The user sickday could not be saved. Please, try again.'));
        }
        else {
          $this->Flash->error(__('Invalid file name'));
        }

        $logins = $this->UserSickdays->users->find('list', ['limit' => 200]);
        $this->set(compact('userSickday', 'logins'));
    }
  }

    /**
     * Edit method
     *
     * @param string|null $id User Sickday id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userSickday = $this->UserSickdays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSickday = $this->UserSickdays->patchEntity($userSickday, $this->request->getData());
            if ($this->UserSickdays->save($userSickday)) {
                $this->Flash->success(__('The user sickday has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user sickday could not be saved. Please, try again.'));
        }
        $logins = $this->UserSickdays->Logins->find('list', ['limit' => 200]);
        $this->set(compact('userSickday', 'logins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Sickday id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userSickday = $this->UserSickdays->get($id);
        if ($this->UserSickdays->delete($userSickday)) {
            $this->Flash->success(__('The user sickday has been deleted.'));
        } else {
            $this->Flash->error(__('The user sickday could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function upload(){

      $myname = $this->request->getData('file.name');
      $mytmp = $this->request->getData('file.tmp_name');

      $myext = substr(strrchr($myname, "."), 1);
      $mypath = "upload\\".Security::hash($myname).".".$myext;

      if(move_uploaded_file($mytmp, WWW_ROOT.$mypath)){
      //  $this->Files->save($file);
        return $mypath;
      }

      return false;
    }
}
