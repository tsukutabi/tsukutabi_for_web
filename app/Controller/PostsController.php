<?php
App::uses('Folder','Utility','Session');
class PostsController extends AppController{
	public $layout = 'index';
	public $helpers = array( 'Html','Form','Session','Rss');
	public $components= array('Session','Auth','RequestHandler','Search.Prg','Security','DebugKit.Toolbar');
	public $presetVars = array(
		array('field' => 'title', 'type' => 'value'),
	);
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('users/login',
		'users/add','index','view','indexjson','viewjson');
	}
	function find() {
		$this->Prg->commonProcess();
		$this->paginate['conditions'] = $this->Post->parseCriteria($this->passedArgs);
		$this->set('find_articles', $this->paginate());
	}
	// ホームの表示
	public function index()
	{
        $this->set('title_for_layout','do travel,share it');
		$params = array(
			// 15件取る
			'order' => 'modified desc','limit' =>'15'
			);
		// ユーザーの名前を取る。
		$this->set('username',$this->Session->read('Auth.User.username'));
		// 以下書き換える!!
		$this->set('posts',$this->Post->find('all'));
		// 新着のデータ
		$this->set('NewPost',$this->Post->find(),30);
	}
	public function indexjson(){
		$this->viewClass ='Json';
		$this->set('entries',$this->Post->find('all'));
		$this->set('_serialize',array('entries'));
	}
	// ページの詳細を表示する。
	public function view($id= null)
	{
        $sqlfortitle = "select MainTitle from posts where id = $id";
        $a=$this->Post->query($sqlfortitle);
        $b=$a[0]['posts']['MainTitle'];
        $this->set('title_for_layout',$b);
        $this->set('user_id',$this->Session->read('Auth.User.id'));
		$this->Post->id=$id;
		$this->set('post',$this->Post->read());
	}

	public function viewjson($id = null){
		$this->viewClass = 'Json';
		$this->Post->id=$id;
		$this->set('post',$this->Post->read());
		$this->set('_serialize',array('post'));
	}
	// 旅行記の作成
	public function add (){
		$this->layout='add';
		$this->set('title_for_layout','つくたび作成ページ');
		$this->set('userid',$this->Session->read('Auth.User.id'));
		$this->set('token',$this->Session->read('_Token.key'));
		$token = $this->Session->read('_Token,key');
		$this->set('tag_name',$this->Post->GetTagName());
	if ($this->request->is('post') && $_POST['access.key'] == $token){
		$this->log($_REQUEST,LOG_DEBUG);
		$this->log($_POST,LOG_DEBUG);
		$this->log($_FILES,LOG_DEBUG);
		$this->Post->create();
		// ファイル数のチェック80枚以下はエラー
		$number = count($_FILES["photos"]["tmp_name"]);
		$this->log($number,LOG_DEBUG);
		if ($number>80) {
			$this->Session->setFlash('画像の枚数は80枚以内にして下さい');
			return 0;
		}
//        		画像のmimetypeの判定とリネーム アップロードの処理
        for ($i=0; $i <$number; $i++){
            list($img_width[$i], $img_height[$i], $mime_type[$i], $attr[$i]) = getimagesize($_FILES['photos']['tmp_name'][$i]);
            $img_extension[$i]=$this->Post->checkmime($mime_type[$i]);
            $image["imgname$i"]= md5(microtime()).".$img_extension[$i]";
            move_uploaded_file($_FILES['photos']['tmp_name'][$i],IMAGES.$image["imgname$i"]);
        }
//        アップロードされた画像の名前を結合する
        $savedimages = implode(",",$image);
        $comments=$this->data['photocomments'];
        $ImgComments = implode(",",$comments);
			$database =array(
			'Post'=>array(
				'MainTitle'=>$this->data['MainTitle'],
				'SubTitle'=>$this->data['SubTitle'],
				'MainImg'=>$image["imgname0"],
				'Images'=>$savedimages,
                'user_id'=>$this->Session->read('Auth.User.id'),
				'ImgComments'=>$ImgComments,
//				'BackgroundImage'=>$BackgroundImage_renamed,
				)
			);
		 if($this->Post->save($database)){
            $this->Session->setFlash('保存が完了しました。');
            $this->redirect(
				array('controller'=>'posts','action'=>'index')
			);
         }
    }// is(post)の閉じタグ
		 // throw new MethodNotAllowedException('POSTでアクセスして下さい。');
	} //add functionのとじタグ

	public function contents($bgimgname ) {
    	$this->layout = false;
    	$post = $this->Post->findBybgimgname($bgimgname);
    	if (empty($post)) {
      		$this->cakeError('error404');
    	}
		header('Content-type: ' . $post['Post']['filetype'] );
    	echo $post['Post']['bgimg'];
  	}
	// 投稿の編集用
	public function edit($id = null){
		$this->Post->id =$id;
//		userのマッチング
		$take_user_id = 'select user_id from posts where id = :id';
		$params = array(
			'id' => $id
		);
		$PostUserId = $this->Post->query($take_user_id,$params);
		$SessionUserid = $this->Session->read('Auth.User.id');
		$PostUserId == $SessionUserid;
		if ($this->request->is('get')  ){
			$this->request->data = $this->Post->read();
		}else{
			if($this->Post->save($this->request->data)) {
				$this->Session->setFlash('成功');
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash('エラー');
			}
		}
	}

	// 投稿を削除する
	// 後、userとのマッチングをする。
	public function delete($id){
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if(MatchUserIdToUser){
			$this->Post->delete($id);
			$this->Session->setFlash(__(' id: %s は削除されました。', h($id)));
			return $this->redirect(array('action' => 'index'));
		}
	}



}