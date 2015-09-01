<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

App::uses('CakeEmail', 'Network/Email');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
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


    //                push通知 like twiiter facebook

    public function sendemail_to_added_user($user_id){

//                email送信のコードを書く by こうすけ http://kwski.net/cakephp-2-x/1017/
//                commentされた postsのuserに送信されるようにする。


        $sql_fetch_useremailadress = 'select email from users where id =:id';

        	$params = array(
                'id' => $user_id
            );
		$users_email = $this->query($sql_fetch_useremailadress,$params);

        $Commentedemail = new CakeEmail( 'gmail');                        // インスタンス化
                $Commentedemail->from( array( 'sender@domain.com' => 'Sender'));  // 送信元
                $Commentedemail->to( $users_email);                      // 送信先
                $Commentedemail->subject( 'メールタイトル');                      // メールタイトル

                $Commentedemail->emailFormat( 'text');                            // フォーマット
                $Commentedemail->template( 'templete');                           // テンプレートファイル
                $Commentedemail->viewVars( compact( 'var1', 'var2'));             // テンプレートに渡す変数

                $Commentedemail->send();
    }

}
