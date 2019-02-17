<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\ORM\TableRegistry;

/**
 * UserHolidays Controller
 *
 * @property \App\Model\Table\UserHolidaysTable $UserHolidays
 *
 * @method \App\Model\Entity\UserHoliday[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserHolidaysController extends AppController
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
        $userHolidays = $this->paginate($this->UserHolidays);

        $this->set(compact('userHolidays'));
    }

    /**
     * View method
     *
     * @param string|null $id User Holiday id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userHoliday = $this->UserHolidays->get($id, [
            'contain' => ['users']
        ]);

        $this->set('userHoliday', $userHoliday);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userHoliday = $this->UserHolidays->newEntity();
        if ($this->request->is('post')) {
            $userHoliday = $this->UserHolidays->patchEntity($userHoliday, $this->request->getData());
            $userHoliday->user_id = $this->Auth->user('id');

          //  dd($userHoliday->start_date->diffInDays($userHoliday->end_date));

            //Calculate days dfference between start and end date
            // function that does the date calc and compares with days available

            // Days available greater than 0
            // Days difference lower than days available.
            // throw error if either fails

            $this->loadModel('Users');
            $user = $this->Users->find()->select(['available_days', 'id'])->where(['id' => $this->Auth->user('id')])->first();
            //dd($user->available_days);


            $days_taken = $this->calculateDateDifference($userHoliday->start_date, $userHoliday->end_date);
            $days_available = $this->daysAvailable($user->available_days, $days_taken);

          //  dd($days_available);




            // Cakephp: add variables to the object...



          if($days_taken == false){

              $this->Flash->error(__('The end date is lower than the start date or the start date is invalid please correct this!'));
          }

          else{


            $days_taken_variable = "days_taken";
            $userHoliday->$days_taken_variable = $days_taken;

          //  dd($userHoliday);

            // Cakephp: Save the object to the database...



            if ($this->UserHolidays->save($userHoliday)) {
                $this->Flash->success(__('The user holiday has been saved.'));

                $days_available_variable = "available_days";

                $user->$days_available_variable = $days_available;

                $this->Users->save($user);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user holiday could not be saved. Please, try again.'));
        }
      }
        $logins = $this->UserHolidays->users->find('list', ['limit' => 200]);
        $this->set(compact('userHoliday', 'logins'));

  }

    /**
     * Edit method
     *
     * @param string|null $id User Holiday id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userHoliday = $this->UserHolidays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userHoliday = $this->UserHolidays->patchEntity($userHoliday, $this->request->getData());
            if ($this->UserHolidays->save($userHoliday)) {
                $this->Flash->success(__('The user holiday has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user holiday could not be saved. Please, try again.'));
        }
        $logins = $this->UserHolidays->Logins->find('list', ['limit' => 200]);
        $this->set(compact('userHoliday', 'logins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Holiday id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userHoliday = $this->UserHolidays->get($id);
        if ($this->UserHolidays->delete($userHoliday)) {
            $this->Flash->success(__('The user holiday has been deleted.'));
        } else {
            $this->Flash->error(__('The user holiday could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function calculateDateDifference($date1, $date2)
    {

      //$now = new DateTime();
      //$now->setTimezone(new DateTimeZone('Europe/London'));
      //$getTimeStamp = $now->getTimezone();
      //$date1 = date('Y/m/d');
      //$date = date();

      //dd($getTimeStamp);

      $current_date = strtotime(date('Y-m-d'));

      $result1 = strtotime($date1);

      //dd($result, $result1);

    //  $difference = $date1->diff($date)->format("&d");

      //dd($date1, $date);


        if($date2 > $date1 && $result1 >= $current_date){
              $difference = $date2->diff($date1)->format("%d");
        return $difference;
      }
            else {

            return false;
          }
}

    public function daysAvailable($days_available, $days_taken){

            $result = $days_available - $days_taken;

            return $result;

    }
}
