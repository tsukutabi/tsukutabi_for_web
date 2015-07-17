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
        if(IMAGETYPE_JPEG == $mime_type){
            $img_extension = "jpg";
        }elseif( IMAGETYPE_PNG == $mime_type){
            $img_extension = "png";
        }elseif( IMAGETYPE_GIF == $mime_type){
            $img_extension = "gif";
        }else{
            $img_extension = null;
        }
            return $img_extension;
	}
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