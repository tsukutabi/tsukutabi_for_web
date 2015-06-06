<?php
App::uses('AppModel', 'Model');
class User extends AppModel {
    public $validate = array(
        'username' => array(
            'required' => array(
                'message' => 'ユーザー名を入れて下さい。'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'パスワードを入力して下さい。'
            )
        ),
        'email'=> array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'メールアドレスを入力して下さい。'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => true
            )
        )
    );
    public function beforeSave($options = array()) {
            function get_sha256($target) {
            return hash(‘sha256′, $target);
            }
        $salt = mt_rand();
                    $this->log($salt,LOG_DEBUG);
        $_POST['User']['salt']= $salt;
                    $this->log($this->data['User'],LOG_DEBUG);
                    $this->log($_POST['User'],LOG_DEBUG);
        $this->data['User']['password'] =get_sha256($salt,$this->data['User']['password']);
        // $this->data['User']['password']=AuthComponemt::password($this->data['User']['password']);
            return true;
    }
    public function view($value=''){
        $userarticle =$this->posts
    }
}