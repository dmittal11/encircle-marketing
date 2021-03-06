<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use DateTime;

/**
 * UserTimesheets Controller
 *
 * @property \App\Model\Table\UserTimesheetsTable $UserTimesheets
 *
 * @method \App\Model\Entity\UserTimesheet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserTimesheetsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $userTimesheets = $this->UserTimesheets->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')]]);
        $userTimesheets = $this->paginate($userTimesheets);
        $this->set(compact('userTimesheets'));
    }

    /**
     * View method
     *
     * @param string|null $id User Timesheet id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->hasPermissionToAmendTimesheet($id)){


        $userTimesheet = $this->UserTimesheets->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userTimesheet', $userTimesheet);
    }
    else {
      $this->Flash->error(__('You do not sufficient privileges.'));
      return $this->redirect(['controller' => 'Users', 'action' => 'index']);
    }
  }

    /**
     * Add method for user time sheets
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userTimesheet = $this->UserTimesheets->newEntity();
        if ($this->request->is('post')) {
            $userTimesheet = $this->UserTimesheets->patchEntity($userTimesheet, $this->request->getData());
            $start_time = $this->convertTimeToMinutes($userTimesheet->start_time);
            $end_time = $this->convertTimeToMinutes($userTimesheet->end_time);
            $time_diff = $this->calculateTimeDifference($start_time, $end_time);

            if($time_diff == false){
              $this->Flash->error(__('The user timesheet could not be saved. Please try again.'));
            }
             else{

            $userTimesheet->start_date = $this->convertAttributeToDateType($this->request->getData('start_date'));
            $userTimesheet->duration = $time_diff;
            $userTimesheet->user_id = $this->Auth->user('id');

            if ($this->UserTimesheets->save($userTimesheet)) {
                $this->Flash->success(__('The user timesheet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user timesheet could not be saved. Please, try again.'));
        }
      }
        $users = $this->UserTimesheets->Users->find('list', ['limit' => 200]);
        $this->set(compact('userTimesheet', 'users'));
    }



    /**
     * Edit method
     *
     * @param string|null $id User Timesheet id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
      if($this->hasPermissionToAmendTimesheet($id)){


        $userTimesheet = $this->UserTimesheets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userTimesheet = $this->UserTimesheets->patchEntity($userTimesheet, $this->request->getData());

            $start_time = $this->convertTimeToMinutes($userTimesheet->start_time);
            $end_time = $this->convertTimeToMinutes($userTimesheet->end_time);
            $time_diff = $this->calculateTimeDifference($start_time, $end_time);

            if($time_diff == false){
              $this->Flash->error(__('The user timesheet could not be saved. Please try again.'));
            }
             else{

            $userTimesheet->start_date = $this->convertAttributeToDateType($this->request->getData('start_date'));
            $userTimesheet->duration = $time_diff;

            $userTimesheet->user_id = $this->Auth->user('id');

            if ($this->UserTimesheets->save($userTimesheet)) {
                $this->Flash->success(__('The user timesheet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user timesheet could not be saved. Please, try again.'));
        }
      }

        $users = $this->UserTimesheets->Users->find('list', ['limit' => 200]);
        $this->set(compact('userTimesheet', 'users'));
      }
      else{
        $this->Flash->error(__('You do not sufficient privileges.'));
        return $this->redirect(['controller' => 'Users', 'action' => 'index']);
      }

  }

    /**
     * Delete method
     *
     * @param string|null $id User Timesheet id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

      if($this->hasPermissionToAmendTimesheet($id)){


        $this->request->allowMethod(['post', 'delete', 'get']);
        $userTimesheet = $this->UserTimesheets->get($id);
        if ($this->UserTimesheets->delete($userTimesheet)) {
            $this->Flash->success(__('The user timesheet has been deleted.'));
        } else {
            $this->Flash->error(__('The user timesheet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    else{
      $this->Flash->error(__('You do not sufficient privileges.'));
      return $this->redirect(['controller' => 'Users', 'action' => 'index']);
    }
  }

    public function convertAttributeToDateType($date){
      return new Date($date);
    }



    public function calculateTimeDifference($start_time, $end_time) {

      if($end_time > $start_time){
        return $end_time - $start_time;
      }

      return false;
    }

    public function convertTimeToMinutes($time){

        $noon_time = new DateTime("12:00:00.0000000");
        $hours = (int)$time->format('h');
        $mins = (int)$time->format('i');

        if($time >= $noon_time){

          $hours = $hours + 12;
        }

        return (($hours * 60) + $mins);
    }

    public function pendingUserTimesheets(){

        if ($this->request->is(['patch', 'post', 'put', 'get'])) {

            $this->paginate = [
                'contain' => ['users']
            ];

            $conditions = [
              'conditions' => [
                'and' => [
                  [
                    'status' => "Pending"
                  ],
                  'user_id' => $this->Auth->user('id')
               ]
             ]
           ];
         }

      $userTimesheets = $this->UserTimesheets->find('all', $conditions);
      $userTimesheets = $this->paginate($userTimesheets);
      $this->set('userTimesheets', $userTimesheets);
      $this->set('userTimeSheets', true);
    }

    public function rejectedUserTimesheets(){


            $this->paginate = [
                'contain' => ['users']
            ];

            $conditions = [
              'conditions' => [
                'and' => [
                  [
                    'status' => "Rejected"
                  ],
                  'user_id' => $this->Auth->user('id')
               ]
             ]
           ];

      $userTimesheets = $this->UserTimesheets->find('all', $conditions);
      $userTimesheets = $this->paginate($userTimesheets);
      $this->set('userTimesheets', $userTimesheets);
      $this->set('userTimeSheets', true);
    }

    public function approvedUserTimesheets(){
     return $this->redirect("http://localhost/bootstrap-calendar-master/bootstrap-calendar-master/convertData.php?id=" . $this->Auth->user('id'));
    }

    public function changeStatusApproved($id = null){

      if($this->userIsAdmin()){

        $userTimesheet = $this->UserTimesheets->get($id, [
            'contain' => []
        ]);

        $userTimesheet->status = "Approved";
        if ($this->UserTimesheets->save($userTimesheet)) {
          $this->Flash->success(__('The user timesheet status has been changed to approved.'));
        } else {
          $this->Flash->error(__('The user timesheet status can not be changed.'));
        }

        return $this->redirect(['controller' => 'Users', 'action' => 'view', $this->getUseridFromTimesheets($id)]);
      } else {
        $this->Flash->error(__('You have insufficient privileges.'));
        return $this->redirect(['controller' => 'Users', 'action' => 'index']);
      }
  }

  public function changeStatusRejected($id = null){
          if($this->userIsAdmin()){
          $userTimesheet = $this->UserTimesheets->get($id, [
              'contain' => []
          ]);
              $userTimesheet->status = "Rejected";
              if ($this->UserTimesheets->save($userTimesheet)) {
                  $this->Flash->success(__('The user timesheet status has been changed to rejected.'));

              }

              else
                  {
                    $this->Flash->error(__('The user timesheet status can not be changed.'));
                  }
              return $this->redirect(['controller' => 'Users', 'action' => 'view', $this->getUseridFromTimesheets($id)]);
      } else
          {
              $this->Flash->error(__('You have insufficient privileges.'));
              return $this->redirect(['controller' => 'Users', 'action' => 'index']);


    }

    }

public function changeStatusPending($id = null){

      if($this->userIsAdmin()){

          $userTimesheet = $this->UserTimesheets->get($id, [
              'contain' => []
          ]);

          $userTimesheet->status = "Pending";
          if ($this->UserTimesheets->save($userTimesheet)) {
              $this->Flash->success(__('The user timesheet status has been changed to pending.'));
          }else {
              $this->Flash->error(__('The user timesheet status can not be changed.'));
          }

      return $this->redirect(['controller' => 'Users' ,'action' => 'view', $this->getUseridFromTimesheets($id)]);

    } else{

      $this->Flash->error(__('You have insufficient privileges.'));

      return $this->redirect(['controller' => 'Users', 'action' => 'index']);
  }

}
}
