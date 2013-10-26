<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $levels = array(
        1 => 'Lecture seule',
        5 => 'Accès simplifié',
        7 => 'Accès complet',
        9 => 'Super-administrateur'
    );

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => '/',
            'logoutRedirect' => '/',
            'authorize' => array('Controller')
        ),
        'Cookie' => array(
            'key' => 'vKh5SYhHDzZ99cA1m19SDgwbNfgpLBUM8ZtVAf06pLiEp2gTwT31KEhrWbXnMZ5w',
            'httpOnly' => true
        )
    );
    
    public $uses = array('User');

    public function beforeFilter() {

        if (!$this->Auth->loggedIn() && $this->Cookie->read('remember_me_cookie')) {
            $cookie = $this->Cookie->read('remember_me_cookie');

            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.username' => $cookie['username'],
                    'User.password' => $cookie['password']
                )
            ));

            if ($user) {
                if($this->Auth->login($user['User'])) {
                    $this->loginSuccessFlash("Reconnexion automatique");
                } else {
                    $this->redirect('/users/logout');
                }
            }
        }
    
        $this->Auth->allow('users', 'login');
        //$this->set('authuser', $this->Auth->user);
    }
    
    public function loginSuccessFlash($action = "Connexion") {
        $h = date('H');
        if($h>=0 && $h<4) {
            $prefix = "Bonsoir";
            $suffix = "Encore debout ?";
        } elseif ($h>=4 && $h<7) {
            $prefix = "Bonjour";
            $suffix = "Déjà debout ?";
        } elseif ($h>=7 && $h<12) {
            $prefix = "Bonjour";
            $suffix = "Passez une bonne journée...";
        } elseif ($h>=12 && $h<20) {
            $prefix = "Bonjour";
            $suffix = "Je peux vous aider ?";
        } elseif ($h>=20) {
            $prefix = "Bonsoir";
            $suffix = "Passez une bonne soirée...";
        }
        
        $this->Session->setFlash(__($action.' réussie. '.$prefix.' '.$this->Auth->user('initiales').' ! '.$suffix), 'flash/success');
    }
    
    public function isAuthorized($user) {
        if (isset($user['level']) && $user['level'] == 9) {
            return true;
        }
        return true; // TODO
    }

}
