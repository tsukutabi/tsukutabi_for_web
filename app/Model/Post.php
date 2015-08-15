<?php
/**
* posts用のmodelですよっと
*
*/
class Post extends AppModel
{
	public $belongsTo = 'User';
	public $hasMany = array( 'Comment','Fav');
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


	public function get_userid($id){
		$take_user_id = 'select user_id from posts where id = :id';

		$params = array(
			'id' => $id
		);
		$data = $this->query($take_user_id,$params);
		return $data;
	}

	public function GetTagName (){
		$get_tag_name_ql = 'SELECT name FROM tags;';
		$tagname = $this->query($get_tag_name_ql);

		return $tagname;
	}


	public function GetTagNum (){
		$get_tag_num_ql = 'SELECT COUNT(ID) FROM tags;';
		$tagnum= $this->query($get_tag_num_ql);

		return $tagnum;

	}






}