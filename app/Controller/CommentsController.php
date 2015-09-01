<?php
class CommentsController extends AppController{
    public $helper = array('Html','Form');
    public $components= array('Session','Auth','RequestHandler','Search.Prg','Security');
    public function add (){
        if ($this->request->is('post')){
            if ($this->Comment->save($this->request->data)){
                $this->Session->setFlash('保存が完了しました。');
                $this->redirect(array('controller'=>'posts','action'=>'view',$this->data['Comment']['post_id']));



            }else{
                $this->Session->setFlash('投稿できませんでした!!');
            }
        }
    }

    public function edit ($id){
        


        if ($this->request->is('post') && $this->request->is('ajax') ){

        }

    }

    public function delete($id){
        if ( $this->request->is('get') ){
            throw new MethodNotAllowedException();
        }

        if ($this->request->is('ajax') && $this->request->is('post')){
            if($this->Comment->delete($id)){
                $this->autoLayout = false;
                $this->autoRender = false;
                $response = array('id' => $id);
                $this->header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
        }
        $this->redirect(array('controller'=>'posts','action'=>'index'));

    }

}