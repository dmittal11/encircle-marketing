<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Security;
use Cake\I18n\Date;

/**
 * Usersickdays Controller
 *
 * @property \App\Model\Table\UsersickdaysTable $Usersickdays
 *
 * @method \App\Model\Entity\Usersickday[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersickdaysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $usersickdays = $this->paginate($this->UserSickdays);

        $this->set(compact('usersickdays'));

    }

    /**
     * View method
     *
     * @param string|null $id Usersickday id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersickday = $this->UserSickdays->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('usersickday', $usersickday);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersickday = $this->UserSickdays->newEntity();
          //$this->loadModel('Users');
        if ($this->request->is('post')) {

          $usersickday = $this->UserSickdays->patchEntity($usersickday, $this->request->getData());
          $usersickday->user_id = $this->Auth->user('id');

          $usersickday->start_date = $this->convertAttributeToDateType($usersickday->start_date);
          $usersickday->end_date = $this->convertAttributeToDateType($usersickday->end_date);

          $usersickday->duration = $this->calculateDateDifference($usersickday->start_date, $usersickday->end_date);
          if($usersickday->duration){

          $usersickday->file = $this->upload();

          if($usersickday->file){



            if ($this->UserSickdays->save($usersickday)) {
                $this->Flash->success(__('The usersickday has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usersickday could not be saved. Please, try again.'));
        }
      }
      else {
        $this->Flash->error(__('The dates are invalid, please try again!'));
      }
    }


        $users = $this->UserSickdays->Users->find('list', ['limit' => 200]);
        $this->set(compact('usersickday', 'users'));

  }

    /**
     * Edit method
     *
     * @param string|null $id Usersickday id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersickday = $this->UserSickdays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersickday = $this->UserSickdays->patchEntity($usersickday, $this->request->getData());
            $usersickday->user_id = $this->Auth->user('id');

            $usersickday->start_date = $this->convertAttributeToDateType($usersickday->start_date);
            $usersickday->end_date = $this->convertAttributeToDateType($usersickday->end_date);

            $usersickday->duration = $this->calculateDateDifference($usersickday->start_date, $usersickday->end_date);

            if($usersickday->duration){

            $usersickday->file = $this->upload();

            if($usersickday->file){



              if ($this->UserSickdays->save($usersickday)) {
                  $this->Flash->success(__('The usersickday has been saved.'));

                  return $this->redirect(['action' => 'index']);
              }

              $this->Flash->error(__('The usersickday could not be saved. Please, try again.'));
          }
        }
        else {
          $this->Flash->error(__('The dates are invalid, please try again!'));
        }

        }
        $users = $this->UserSickdays->Users->find('list', ['limit' => 200]);
        $this->set(compact('usersickday', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usersickday id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post','get', 'delete']);
        $usersickday = $this->UserSickdays->get($id);
        if ($this->UserSickdays->delete($usersickday)) {
            $this->Flash->success(__('The usersickday has been deleted.'));
        } else {
            $this->Flash->error(__('The usersickday could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function calculateDateDifference($start_date, $end_date) {
      if($end_date > $start_date && !$start_date->isPast()){
        return $end_date->diffInDays($start_date);
      }

      return false;
    }

    public function upload(){

      $myname = $this->request->getData('file.name');
      $mytmp = $this->request->getData('file.tmp_name');

      $myext = substr(strrchr($myname, "."), 1);
      $mypath = "upload\\".Security::hash($myname).".".$myext;
      if(move_uploaded_file($mytmp, WWW_ROOT.$mypath)){
        return $mypath;
      }

      return false;
    }

    public function convertAttributeToDateType($date){
      return new Date($date);
    }
}
