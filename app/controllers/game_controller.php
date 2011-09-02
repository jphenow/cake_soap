<?php
class GameController extends AppController {

	protected static $key = '11cadcc1719928fc5ec3d68ce7a24de0';
	var $name = "Game";

	function index(){
		global $key;
		$c = $this->Game->getGames(array(self::$key));
		$this->set('checkKey', $c);
		$this->render();
	}
}
