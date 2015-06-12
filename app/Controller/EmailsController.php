<?php
App::uses('CakeEmail', 'Network/Email');

class EmailsController extends AppController{
    // 入会用
    public function SentToConfrim(){
        // メール内容
        $mailbody = array(
            'name' => 'つくたび事務局',
            'content' => "つくたび入会ありがとうございます。",
        );

        // メール送信実行
        $email = new CakeEmail('smtp');     // ←手順2で編集した配列名を指定
        $sent = $email
            ->template('text_mail')         // ←テンプレ名
            ->viewVars($mailbody)           // ←メール内容配列をテンプレに渡す
            ->from(array('kousuketanihata@yahoo.co.jp' => '送信元名'))
            ->to('送信先アドレス')
            ->subject('件名')
            ->send();

        if ( $sent ) {
             echo 'メール送信成功！' ;
        } else {
             echo 'メール送信失敗' ;
        }
    }
    // パスワード再発行
    public function forgetpassword($value=''){

    }
}