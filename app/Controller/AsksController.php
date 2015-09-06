<?php
App::uses('AppController', 'Controller');
/**
 * Asks Controller
 *
 * @property Ask $Ask
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AsksController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Text', 'Html', 'Time');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function index(){

	}
	public function add(){

	}
}
