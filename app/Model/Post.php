<?php
/**
* posts用のmodelですよっと
*
*/
class Post extends AppModel
{
	public $belongsTo = 'User';
	public $hasMany = "Comment";
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
		// 例
		'author_id' => array('type' => 'value'),
		'title' => array('type' => 'like'),
	);
	public $validate = array(
			'MainTitle'=>array(
				'rule'=>array('between',3,300)
				),
			'SubTitle'=>array(
				'rule'=>array('between',3,300),
				'message'=>'文字数は3文字以上300文字以内にして下さい。'
				),
				'notEmpty'=>true,
		);

//	投稿の人とsession.authでのマッチング

    public function MatchUserIdToUser($postsUserid){
        $SesssionUserid = $this->Sesion->read('Auth.User.username');
        if( $SesssionUserid === $postsUserid){
            $result= true;
        }else{
            $result =false;
        }
            return $result;

    }


	public function get_userid($id){
		$take_user_id = 'select user_id from posts where id = :id';

		$params = array(
			'id' => $id
		);


		$data = $this->query($take_user_id,$params);
		return $data;


	}

    

}