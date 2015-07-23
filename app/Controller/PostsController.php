<?php
App::uses('Folder','Utility','Session');
class PostsController extends AppController{
	public $layout = 'index';
	public $helpers = array( 'Html','Form','Session','Rss');
	public $components= array('Session','Auth','RequestHandler');
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('users/login',
		'users/add','index','view','jsonapi');
	}

        // 以下 public
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
	// ページの詳細を表示する。
	public function view($id= null)
	{
        $sqlfortitle = 'select MainTitle from posts where id ="$id"';
        $this->set('title_for_layout',$this->Post->query($sqlfortitle));
        $this->set('user_id',$this->Session->read('Auth.User.id'));
		$this->Post->id=$id;
		$this->set('post',$this->Post->read());

	}

	// 旅行記の作成
	public function imgadd (){
	// $this->set('title_for_layout','つくたび_旅行記作成ページ');
	$this->autoRender = false;
	$this->layout = false;
	$this->autoLayout = false;
	 if ($this->request->is('post')) {
			$number = count($_FILES["files"]["tmp_name"]);
		if ($number>59) {
			$this->Session->setFlash('アップロードする画像は60枚以下にして下さい。');
		}
		for ($i=0; $i <$number; $i++){
		list($img_width[$i], $img_height[$i], $mime_type[$i], $attr[$i]) = getimagesize($_FILES['files']['tmp_name'][$i]);


		checkmime($mime_type[$i]);
		// switch($mime_type[$i]){
		// 	case IMAGETYPE_JPEG:
		// 		$img_extension[$i] = "jpg";
		// 			break;
		// 	case IMAGETYPE_PNG:
		// 		$img_extension[$i] = "png";
		// 			break;
		// 	case IMAGETYPE_GIF:
		// 		$img_extension[$i] = "gif";
		// 			break;
		// 	default:
		// 	echo h('この拡張子はサポートしておりません。');
		// }
		$type =$img_extension[$i];
		$image["imgname$i"]= md5(microtime()).".$type";
		$uploadfile = IMAGES . $image["imgname$i"];
		$this->log($uploadfile,LOG_DEBUG);
		$result = move_uploaded_file($_FILES['userfile']['tmp_name'][$i],$uploadfile);
	};
	// forここまで
	$imagename = implode(",", $image);
 	$basedata = array(
		'Post' => array(
		'title'=>$this->data['MainTitle'],
		'subtitle'=>$this->data['SubTitle'],
		'body'=>$this->data['body'][0],
		'mainimg'=>$image['imgname0'],
		'bodies'=>$bodies,
		'images'=>$imagename,
				)
			);
		$this->Post->save($basedata);
		}
		throw new MethodNotAllowedException('エラー');
	}

	public function add (){
	$this->layout='add';
	$this->set('title_for_layout','つくたび作成ページ');
	$this->set('userid',$this->Session->read('Auth.User.id'));
	if ($this->request->is('post')){
		$this->log($_POST,LOG_DEBUG);
		$this->log($_FILES,LOG_DEBUG);
		$this->Post->create();
		// ファイル数のチェック80枚以下はエラー
		$number = count($_FILES["photos"]["tmp_name"]);
		$this->log($number,LOG_DEBUG);
		if ($number>80) {
			$this->Session->setFlash('');
			return 0;
		}
//        		画像のmimetypeの判定とリネーム アップロードの処理
        for ($i=0; $i <$number; $i++){
            list($img_width[$i], $img_height[$i], $mime_type[$i], $attr[$i]) = getimagesize($_FILES['photos']['tmp_name'][$i]);
            $img_extension[$i]=$this->Post->checkmime($mime_type[$i]);
            $image["imgname$i"]= md5(microtime()).".$img_extension[$i]";
//            $uploadfile = IMAGES . $image["imgname$i"];
            move_uploaded_file($_FILES['photos']['tmp_name'][$i],IMAGES . $image["imgname$i"]);
        }
//        アップロードされた画像の名前を結合する
        $savedimages = implode(",",$image);
        $comments=$this->data['photocomments'];
        $ImgComments = implode(",",$comments);
			$database =array(
			'Post'=>array(
				'MainTitle'=>$this->data['MainTitle'],
				'SubTitle'=>$this->data['SubTitle'],
				'MainImg'=>IMAGES.$image["imgname0"],
				'Images'=>$savedimages,
                'user_id'=>$this->Session->read('Auth.User.id'),
				'ImgComments'=>$ImgComments,
//				'BackgroundImage'=>$BackgroundImage_renamed,
				)
			);
		 if($this->Post->save($database)){
            $this->Session->setFlash('保存が完了しました。');
             $this->redirect(array(
                 'controller'=>'posts',
                 'view'=>'index',
//                 'id'=>
             ));
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
	// userが自分の投稿を所得する。
	public function user_post($user_id){
		if (!id) {
			throw new NotFoundException(__('無効なポストです。'));
		}
		$post = $this->Post->findById($id);
		if(!$post){
		throw new NotFoundException(__('無効なポストです。'));
		}
	}

	// 投稿の編集用
	public function edit($id = null){
		$this->Post->id =$id;
		if ($this->request->is('get')){
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
	// ここにアクセスしたら jsonが帰るって来るよ!!
	// webview用なので お察し下さい。
	public function jsonapi(){
		$this->viewClass ='Json';
		$this->set('entries',$this->Post->find('all'));
		$this->set('_serialize',array('entries'));
	}
	// 投稿を削除する
	// 後、userとのマッチングをする。
	public function delete($id){
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
			if(MatchUserIdtoPostsUser){
                $this->Post->delete($id);
			    $this->Session->setFlash(__(' id: %s は削除されました。', h($id)));
		        return $this->redirect(array('action' => 'index'));
		    }
		}

	// お気に入り登録機能
	public function fav($id){
		//getとかはエラー
		if ($this->request->is('ajax') && $this->request->is('post')){
				$this->Post->save($FavDatabase);
		}elseif($this->request->is('get')){
			throw new MethodNotAllowedException('getで投げられてますよ~~');
		}
	}



	// 使う関数まとめ private
	//
	// ユーザーIDとpost idのマッチングをする。
	private function MatchUserIdtoPost($value='')
	{

	}
	// 画像の拡張子をリネームする
	private function RenameImageName($value='')
	{

	}
}