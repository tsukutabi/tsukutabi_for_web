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
			'notEmpty'=>'true',
			// 'between'==>array($min)
				),
			'SubTitle'=>array(
				)
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