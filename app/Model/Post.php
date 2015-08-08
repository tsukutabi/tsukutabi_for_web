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

    public function MatchUserIdtoPostsUser($postsUserid){
        $userid = $this->Sesion->read('Auth.User.username');

        if( $userid === $postsUserid){
            $result= true;
        }else{
            $result =false;
        }
            return $result;

    }

    

}