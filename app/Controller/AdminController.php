<?php
/**
* 管理画面用に使う、classです。
*/
class AdminsController extends AppController
{
	// $uses array('posts','users');
	public function index()
	{
		$this->set($items ,$this->items->find('all'));
	}
}