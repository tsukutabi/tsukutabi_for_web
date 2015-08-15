<?php
/**
 * お気に入り登録用のmodelですよっと
 *
 */
class Fav extends AppModel
{
    public $components= array('Session','Auth','RequestHandler','Search.Prg','Security');
    public $belongsTo =array('Post','User');

//    各項目 not null ＋ sanitize

}