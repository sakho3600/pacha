<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');



    public function beforeRender() {
        $this->set('levels', $this->levels);
        parent::beforeRender();
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('User invalide.'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('User enregistré.'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('User impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->User->id = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('User invalide.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('User sauvegardé.'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('User impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
			unset($this->request->data['User']['password']);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('User invalide.'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User supprimé.'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User impossible à supprimer.'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

	
    public function login() {
        $this->layout = 'guest';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
            
                if (isset($this->request->data['remember_me'])) {
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
                    $this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '2 weeks');
                }
            
                $this->Session->setFlash(__('Connexion réussie. Bonjour '.$this->Auth->user('username').' !'), 'flash/success');
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Identifiant ou mot de passe invalide, réessayez.'), 'flash/error');
            }
        }
    }

    public function logout() {
        $this->Session->setFlash(__('Vous avez été déconnecté de l\'application.'), 'flash/success');
        $this->Cookie->delete('remember_me_cookie');
        return $this->redirect($this->Auth->logout());
    }
    
    public function profile() {
        $id = $this->Auth->user('id');
        return $this->redirect('edit/'.$id);
    }
}
