<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;


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

        $this->loadModel('Users');
        $user = $this->Users->find()->select(['available_days', 'id'])->where(['id' => $this->Auth->user('id')])->first();
        $userHolidays = $this->paginate($this->UserHolidays);

        //$this->set(compact('userHolidays'));
        $this->set('userHolidays', $userHolidays);
        $this->set('user', $user);
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

        $this->loadModel('Users');
        $user = $this->Users->find()->select(['available_days', 'id'])->where(['id' => $this->Auth->user('id')])->first();

        $this->set('userHoliday', $userHoliday);
        $this->set('user', $user);
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

            //Calculate days dfference between start and end date
            // function that does the date calc and compares with days available

            // Days available greater than 0
            // Days difference lower than days available.
            // throw error if either fails

            $this->loadModel('Users');
            $user = $this->Users->find()->select(['available_days', 'id'])->where(['id' => $this->Auth->user('id')])->first();

            $userHoliday->start_date = $this->convertAttributeToDateType($userHoliday->start_date);
            $userHoliday->end_date = $this->convertAttributeToDateType($userHoliday->end_date);

            $days_taken = $this->calculateDateDifference($userHoliday->start_date, $userHoliday->end_date);

          if(!$days_taken){
              $this->Flash->error(__('The end date is lower than the start date or the start date is invalid please correct this!'));
          } else {

              $userHoliday->days_taken = $days_taken;

              $days_available = $this->Subtractdaysfromdaystaken($user->available_days, $days_taken);

            if($days_available < 0){
                $this->Flash->error(__('Not enough days available'));
            } else {
              if ($this->UserHolidays->save($userHoliday)) {
                  $this->Flash->success(__('The user holiday has been saved.'));

                  $user->available_days = $days_available;

                  $this->Users->save($user);

                  return $this->redirect(['action' => 'index']);
              }

              $this->Flash->error(__('The user holiday could not be saved. Please, try again.'));

            }
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
      //dd($user);
        $userHoliday = $this->UserHolidays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
                $userHoliday = $this->UserHolidays->patchEntity($userHoliday, $this->request->getData());

                $this->loadModel('Users');

                $user = $this->Users->find()->select(['available_days', 'id'])->where(['id' => $this->Auth->user('id')])->first();

            //dd([$userHoliday->days_taken, $user->available_days]);

                $user->available_days = $this->addDaysToAvailableDays($userHoliday->days_taken,$user->available_days);

          //  dd($user->available_days);

              //  $this->Users->save($user);


                $userHoliday->start_date = $this->convertAttributeToDateType($userHoliday->start_date);
                $userHoliday->end_date = $this->convertAttributeToDateType($userHoliday->end_date);
                $days_taken = $this->calculateDateDifference($userHoliday->start_date, $userHoliday->end_date);

                    if(!$days_taken){
                        $this->Flash->error(__('The end date is lower than the start date or the start date is invalid please correct this!'));
                   } else {

                        $userHoliday->days_taken = $days_taken;

                        $days_available = $this->Subtractdaysfromdaystaken($user->available_days, $days_taken);

                          if($days_available < 0){
                              $this->Flash->error(__('Not enough days available'));

                              } else {

                                $this->UserHolidays->save($userHoliday);

                                $user->available_days = $days_available;

                                $this->Users->save($user);

                                $this->Flash->success(__('The user holiday has been saved.'));

                                return $this->redirect(['action' => 'index']);
                              }
                              $this->Flash->error(__('The user holiday could not be saved. Please, try again.'));
        }

      }
        $logins = $this->UserHolidays->users->find('list', ['limit' => 200]);
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
        $this->request->allowMethod(['get','post','delete']);
        $userHoliday = $this->UserHolidays->get($id);

        $this->loadModel('Users');

        $user = $this->Users->find()->select(['available_days', 'id'])->where(['id' => $this->Auth->user('id')])->first();


        $user->available_days = $this->addDaysToAvailableDays($userHoliday->days_taken,$user->available_days);




        if ($this->UserHolidays->delete($userHoliday) && $this->Users->save($user)) {
            $this->Flash->success(__('The user holiday has been deleted.'));
        } else {
            $this->Flash->error(__('The user holiday could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function calculateDateDifference($date1, $date2)
    {
        if($date2 > $date1 && !$date1->isPast()){
              return $date2->diffInDays($date1);
        }

        return false;
    }

    public function Subtractdaysfromdaystaken($days_available, $days_taken){
        return $days_available - $days_taken;
    }

    public function convertAttributeToDateType($date){
      return new Date($date);
    }

    public function addDaysToAvailableDays($days_taken, $available_days){
      return $available_days + $days_taken;
    }



    /**
     * Edit method
     *
     * @param string|null $id User Holiday id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function pendingUserHolidays(){

      $this->paginate = [
          'contain' => ['users']
      ];

      $this->loadModel('Users');
      $user = $this->Users->find()->select(['available_days', 'id'])->where(['id' => $this->Auth->user('id')])->first();

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

     $userHolidays = $this->UserHolidays->find('all', $conditions);

     //dd($userHolidays);

      $userHolidays = $this->paginate($userHolidays);

      //$this->set(compact('userHolidays'));
      $this->set('userHolidays', $userHolidays);
      $this->set('user', $user);

    }

    public function approvedUserHolidays(){

      $this->paginate = [
          'contain' => ['users']
      ];

      $this->loadModel('Users');
      $user = $this->Users->find()->select(['available_days', 'id'])->where(['id' => $this->Auth->user('id')])->first();

      $conditions = [
        'conditions' => [
          'and' => [
            [
              'status' => "Approved"
            ],
            'user_id' => $this->Auth->user('id')
         ]
       ]
     ];

      $userHolidays = $this->UserHolidays->find('all', $conditions);
      $userHolidays = $this->paginate($userHolidays);
      $this->set('userHolidays', $userHolidays);
      $this->set('user', $user);

    }



    public function displayRejectedUserHolidays(){


            $this->paginate = [
                'contain' => ['users']
            ];

            $this->loadModel('Users');
            $user = $this->Users->find()->select(['available_days', 'id'])->where(['id' => $this->Auth->user('id')])->first();

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

            $userHolidays = $this->UserHolidays->find('all', $conditions);
            $userHolidays = $this->paginate($userHolidays);
            $this->set('userHolidays', $userHolidays);
            $this->set('user', $user);
    }

    public function RejectedUserHolidays($id = null){

      $userHoliday = $this->UserHolidays->get($id, [
          'contain' => []
      ]);





      $user_details = $this->UserHolidays->find()
         ->select([
           'id' => 'UserHolidays.id',
           'userEmail' => 'u.email',
           'name'      => 'u.username',
           'startDate' => 'UserHolidays.start_date',
           'endDate' => 'UserHolidays.end_date',
           'status' => 'UserHolidays.status',
           'notes' => 'UserHolidays.notes'
           // IF we don't use column aliases, result will be grouped by tables joined
         ])
         ->join([
           'table' => 'users',
           'alias' => 'u',
           'type' => 'inner',
           'conditions' => 'UserHolidays.user_id = u.id'
         ])
         ->where(
           ['userHolidays.id' => $id],
           ['userHolidays.id' => 'integer']
         )
         ->first();

      //$user_details = $this->paginate($user_details);
      $this->set('user_details', $user_details);

    }

    public function changeStatusCompleted($id = null){

        $userHoliday = $this->UserHolidays->get($id, [
            'contain' => []
        ]);

            $userHoliday->status = "Approved";
            if ($this->UserHolidays->save($userHoliday)) {
                $this->Flash->success(__('The user timesheet has been saved.'));

                  $this->sendEmail($id);

             }

                else {
                    $this->Flash->error(__('The user timesheet can not be saved.'));
                }

                return $this->redirect(['action' => 'index']);
          }

        public function changeStatusRejected($id = null){


            if ($this->request->is(['patch', 'post', 'put'])) {

              $userHoliday = $this->UserHolidays->get($id, [
                  'contain' => []
              ]);


                  $getData =  $this->request->getData();

                  $userHoliday->notes = $getData["notes"];

                  $userHoliday->status = "Rejected";


                if ($this->UserHolidays->save($userHoliday)) {
                    $this->Flash->success(__('The user timesheet has been saved.'));

                      $this->sendEmail($id);

                 }

                    else {
                        $this->Flash->error(__('The user timesheet can not be saved.'));
                    }

                    return $this->redirect(['action' => 'index']);

            }
          }





        public function sendEmail($id)
        {

          //SELECT user_id, email from user_holidays inner join users on user_holidays.user_id = users.id where user_holidays.id = 8

           $user_id = $this->UserHolidays->find()
              ->select([
                'userEmail' => 'u.email',
                'name'      => 'u.username',
                'startDate' => 'UserHolidays.start_date',
                'endDate' => 'UserHolidays.end_date',
                'status' => 'UserHolidays.status',
                'notes' => 'UserHolidays.notes'
                // IF we don't use column aliases, result will be grouped by tables joined
              ])
              ->join([
                'table' => 'users',
                'alias' => 'u',
                'type' => 'inner',
                'conditions' => 'UserHolidays.user_id = u.id'
              ])
              ->where(
                ['userHolidays.id' => $id],
                ['userHolidays.id' => 'integer']
              )
              ->first();


          if($user_id->status == 'Approved'){

            $subject = 'Your Holidays has been Approved';
            $message = 'Dear '.$user_id->name.' your holidays has been approved.<br>Start Date: '.$user_id->startDate.'<br>End Date: '.$user_id->endDate.'<br>Enjoy your time of and looking forward to seeing you again.<br>Regards Admin.';

          }
          else {


            $subject = 'We regret to inform you, your holidays can not take place';
            $message = 'Dear '.$user_id->name.' your holidays can not take place.<br>Start Date: '.$user_id->startDate.'<br>End Date: '.$user_id->endDate.'<br>Reason:'.$user_id->notes.'<br>If you have any concerns or queries please do not hesitate to ask.<br>Regards Admin.';

          }


            $email = new Email('default');

            try{
              $email->to($user_id->userEmail)
                ->emailFormat('html')
                ->subject($subject)
                ->send($message);

              //$mail = $this->Email->send_mail($to, $subject, $message);
              //print_r($mail);
            } catch(Exception $e){
              echo 'Message could not be sent. Email Error: ', $e->getMessage();
            }
        }

}
