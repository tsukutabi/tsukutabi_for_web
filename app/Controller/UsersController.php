<?php
class UsersController extends AppController {
	// App::uses('CakeEmail','Network/Email');
	public $layout = 'index';
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add','login');
	}
	// ユーザー登録
	public function add(){
        if ($this->request->is('post')) {
		$this->User->create();
		$salt ='$2y$04'.mt_rand();
		$userdata['salt']= $salt;
		$userdata['email']=$this->data['User']['email'];
		$userdata['username']=$this->data['User']['username'];
		$userdata['role']=$this->data['User']['role'];
		// $this->log($userdata,LOG_DEBUG);
		// $password=sha1($this->data['User']['password']);
		// $this->log($password,LOG_DEBUG);
		// $password=$salt.$password;
		// $this->log($password,LOG_DEBUG);
		// $password=sha1($password);
		// $this->log($password,LOG_DEBUG);
        $userdata['password'] =crypt($this->data['User']['password'],$salt);
		// $this->log($userdata,LOG_DEBUG);
		if($this->User->save($userdata)) {
			// ユーザーにメールの送信
			$sentmail = new EmailsController;
			$sentmail->send();
			$this->Session->setFlash(__('ユーザ登録が完了しました。登録されたメールアドレスにメールが送信されていますのでご確認下さい。'));
			$this->redirect(array('action' => 'login'));
		}else {
			$this->Session->setFlash(__('ユーザ登録に失敗しました。'));
            }
        }
	}
	public function view($value=''){
	$this->set('posts',$this->Post->find('all'));
	}

}