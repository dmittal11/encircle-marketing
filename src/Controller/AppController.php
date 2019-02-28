<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */

     public $components = array(
            'Flash',
            'Auth' => array(
                'loginRedirect' => array(
                    'controller' => 'users',
                    'action' => 'index'
                ),
                'logoutRedirect' => array(
                    'controller' => 'users',
                    'action' => 'login',
                    'home'
                ),
                'authenticate' => array(
                    'Form' => array(
                        'passwordHasher' => 'DefaultPasswordHasher'
                    )
                )
            ),
            // 'GoogleCalendar.GoogleCalendar' => array(
            //   'id' => 'mittald107@gmail.com',
            //   'secret' => 'fireboy'
            // )
        );

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth');
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security')

        //$isLoggedIn = false;

        if($this->Auth->user('id')){
           $isLoggedIn = true;
        }

        $this->set(compact('isLoggedIn'));
        $this->set('admin', $this->userIsAdmin());
    }

    public function isAuthorized($user)
    {
      if(isset($this->request->params['prefix'])
        && ('admin' == $this->request->params['prefix'])){
          return ($user['username'] == 'Dinesh');
        }
        return true;
    }

    public function userIsAdmin(){
      return $this->Auth->user('admin');
    }
}
