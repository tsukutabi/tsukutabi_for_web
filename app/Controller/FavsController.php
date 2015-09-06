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
            $this->log($_POST,LOG_DEBUG);
            $favsave['user_id'] = $_POST['user_id'];
            $favsave['post_id'] = $_POST['post_id'];
            // json response data ('succeed' と 'message'をJSON形式で返します)
            $succeed = $this->Fav->save($favsave);
            $message = $succeed ? '追加しました' : '追加に失敗しました';
            // Model::$validationErrors があれば、その先頭の一つをメッセージにセット
            if (!$succeed && $this->MyRecord->validationErrors) {
                $validationError = array_shift($this->MyRecord->validationErrors);
                $message = $validationError[0];
            }
            $data = compact('succeed', 'message');
            $this->response->type('json');
            echo json_encode($data);
            exit;
        }
    }
    public function delete(){
        if ($this->request->is('ajax') && $this->request->is('post')){

        }
    }

}