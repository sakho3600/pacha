<?php

App::uses('AppController', 'Controller');

class AuthController extends AppController {
	public function login() {
		$this->layout = 'guest';
  }
}
