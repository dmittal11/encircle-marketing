<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Collection\Collection;
use Cake\I18n\Date;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

  public function initialize()
  {
      parent::initialize();
      $this->Auth->allow(['logout']);
      #$this->loadComponent('Calendar.Calendar');
  }

  public function login() {

    if ($this->request->is('post')) {
       $user = $this->Auth->identify();
       if ($user) {

           $this->Auth->setUser($user);

           return $this->redirect(['controller' => 'Users', 'action' => 'index']);
       } else {
           $this->Flash->error(__('Username or password is incorrect'));
       }
   }

}

  public function logout()
  {
    $this->Flash->success('You are logged out');
    return $this->redirect($this->Auth->logout());
  }

  public function register() {

    $user = $this->Users->newEntity($this->request->getData());


    if($this->request->is('post')){
      if($this->Users->save($user)){
        $this->Flash->success('You are registered and can login');
        return $this->redirect(['action' => 'login']);
      } else{
        $this->Flash->error('You are not registered');
      }
    }
    $this->set(compact('user'));
    $this->set('_serialzie', ['user']);

  }

  public function beforeFilter(Event $event){
    $this->Auth->allow(['register', 'logout']);
  }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

      $id = $this->Auth->user('id');
      $this->loadModel('UserTimesheets');

      $user = $this->Users->get($id, [
          'contain' => []
      ]);

      if($user->admin == 1){

        $user = $this->Users->find('all');
      }



      if ($this->request->is('post')) {
          $input = $this->request->getData();
           $start_date = new Date($input["start_date"]);
           $end_date = new Date($input["end_date"]);

           $conditions = [
             'conditions' => [
               'and' => [
                 [
                   'start_date >= ' => $start_date ,
                   'start_date <= ' => $end_date
                 ],
                 'user_id' => $this->Auth->user('id')
              ]
            ]
          ];

          $userTimesheet = $this->UserTimesheets->find('all', $conditions);
          $userTimesheet = $this->convertToCollectionsAndFindTotalTime($userTimesheet);
          $total = $this->convertTimeToString($userTimesheet['total']);

        } else {

            $userTimesheet = $this->UserTimesheets->find('all',
              [
                'conditions' => [
                  'user_id' => $this->Auth->user('id')
                ]
              ]
            );

            $userTimesheet = $this->convertToCollectionsAndFindTotalTime($userTimesheet);
            $total = $this->convertTimeToString($userTimesheet['total']);
        }


        $this->set('users', $user);
        $this->set('userTimesheets', $userTimesheet['data']);
        $this->set('total', $total);

    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UserHolidays', 'UserSickdays', 'UserTimesheets']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function convertToCollectionsAndFindTotalTime($data){

      $collection = new Collection($data);

      $data = $collection->each(function($row){
          $row->new_duration = $this->convertTimeToString($row->duration);
          return $row;
      });

      return [
        'data'  => $data,
        'total' => $collection->sumOf('duration')];
    }

    public function convertTimeToString($total){
      return intdiv($total, 60). ' Hours '. ($total % 60).' Minutes';
    }

}
