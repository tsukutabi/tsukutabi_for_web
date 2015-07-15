<?php
/**
* posts用のmodelですよっと
*
*/
class Posts extends AppModel
{
	public $belongsTo = 'User';
	public $hasMany = "Comment";
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
	public function checkmime($mime_type)
	{
		switch($mime_type){
			case IMAGETYPE_JPEG:
				$img_extension[$i] = "jpg";
					break;
			case IMAGETYPE_PNG:
				$img_extension[$i] = "png";
					break;
			case IMAGETYPE_GIF:
				$img_extension[$i] = "gif";
					break;
			default:
			echo h('この拡張子はサポートしておりません。');
		}
	}
}