<?php
/**
 * Comment用のmodelですよっと
 *
 */
class Comment extends AppModel
{
    public $belongsTo =array('Post','User');
//    public $validation =
}