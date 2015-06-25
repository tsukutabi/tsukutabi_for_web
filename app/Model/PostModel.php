<?php

/**
* posts用のmodelですよっと
*
*/
class Posts extends AppModel
{
	public $belongsTo = 'User';
	public $hasMany = "Comment";
}