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
            // throw error if either fails.
            $daysToTake = 5;

            $date_difference = $this->calculateDateDifference($userHoliday->start_date, $userHoliday->end_date);

           dd($date_difference);


            $this->loadModel('Users');
            $user = $this->Users->find()->select(['available_days', 'id'])->where(['id' => $this->Auth->user('id')])->first();

            if ($this->UserHolidays->save($userHoliday)) {
                $this->Flash->success(__('The user holiday has been saved.'));

                $user->available_days = $daysToTake;

                $this->Users->save($user);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user holiday could not be saved. Please, try again.'));
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

      //$difference = $date2->diff($date1);
      //$difference->d;

      //dd($date2);

      if($date2 > $date1){

        $difference = date_diff($date2, $date1);
        $difference->intval(format("%R%a days"));

        //dd($difference);

        if($difference > 0){

          return $difference;


          } else {

            return false;
          }


      }





}

}
