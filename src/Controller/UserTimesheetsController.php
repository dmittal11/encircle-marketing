<?php
namespace App\Controller;

use App\Controller\AppController;

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
        $this->paginate = [
            'contain' => ['Logins']
        ];
        $userTimesheets = $this->paginate($this->UserTimesheets);

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
        $userTimesheet = $this->UserTimesheets->get($id, [
            'contain' => ['Logins']
        ]);

        $this->set('userTimesheet', $userTimesheet);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userTimesheet = $this->UserTimesheets->newEntity();
        if ($this->request->is('post')) {
            $userTimesheet = $this->UserTimesheets->patchEntity($userTimesheet, $this->request->getData());
            if ($this->UserTimesheets->save($userTimesheet)) {
                $this->Flash->success(__('The user timesheet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user timesheet could not be saved. Please, try again.'));
        }
        $logins = $this->UserTimesheets->Logins->find('list', ['limit' => 200]);
        $this->set(compact('userTimesheet', 'logins'));
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
        $userTimesheet = $this->UserTimesheets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userTimesheet = $this->UserTimesheets->patchEntity($userTimesheet, $this->request->getData());
            if ($this->UserTimesheets->save($userTimesheet)) {
                $this->Flash->success(__('The user timesheet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user timesheet could not be saved. Please, try again.'));
        }
        $logins = $this->UserTimesheets->Logins->find('list', ['limit' => 200]);
        $this->set(compact('userTimesheet', 'logins'));
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
        $this->request->allowMethod(['post', 'delete']);
        $userTimesheet = $this->UserTimesheets->get($id);
        if ($this->UserTimesheets->delete($userTimesheet)) {
            $this->Flash->success(__('The user timesheet has been deleted.'));
        } else {
            $this->Flash->error(__('The user timesheet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
