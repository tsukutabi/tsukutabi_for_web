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
		array('name' => 'title',
			'type' => 'like'),
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


//	public function match_fav_id ($id = null){

//		$fetch_ = 'select user_id,  from favs;';

//		$params = array(
//			 $id=> $post_id
//		)

//		$data = $this->query($take_user_id,$params);
//		return $fav_boolean;
//	}

	public function fetch_index_four_rows (){
//		indexに返す用のデータを取る!!
//		必要共通項目 記事ID main_title created subtitle お気に入り数
		$new_query = 'SELECT posts.id,posts.MainTitle,posts.SubTitle,posts.MainImg,posts.created,users.username
							  from posts INNER JOIN users ON (posts.user_id = users.id) ORDER BY created LIMIT 40';
		$new_articles = $this->query($new_query);
//		最新の旅行記を50件

//		favs数が大きい旅行記が多い50件
		return $new_articles;
	}

}