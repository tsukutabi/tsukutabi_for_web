<?php

//App::uses('Folder','Utility','Session');

//お気に入り用のcontroller  user/postsとリレーション

class FavsController extends AppController{
    public $helper = array('Html','Form');
    public $components= array('Session','Auth','RequestHandler','Search.Prg');

//
//    public function beforeFilter() {
//        // CSRFチェックのみOFFならこちら
//        if ($this->params['action'] == 'add') {
//             $this->Security->csrfCheck = false;
//            }
//    }
    public function add(){
        $this->log($_REQUEST,LOG_DEBUG);
        $this->autoRender = false;
        $this->autoLayout = false;
        if ($this->request->is('ajax')){
            $this->autoRender = false;
            $this->autoLayout = false;
            $this->log($_POST,LOG_DEBUG);
            $favsave['user_id'] = $_POST['user_id'];
            $favsave['post_id'] = $_POST['post_id'];
            $this->Fav->save($favsave);
            $response = array('id'=> $id);
//            $this->header('Content-Type:application/json');
            echo json_encode($response);
            exit();
        }
    }
    public function delete(){

        if ($this->request->is('ajax') && $this->request->is('post')){

        }
    }

}