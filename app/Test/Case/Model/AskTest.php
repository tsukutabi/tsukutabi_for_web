<?php
App::uses('Ask', 'Model');

/**
 * Ask Test Case
 *
 */
class AskTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ask = ClassRegistry::init('Ask');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ask);

		parent::tearDown();
	}

}
