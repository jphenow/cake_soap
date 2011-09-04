<?php
class GameController extends AppController {

	var $components = array('RequestHandler');
	protected static $key = '11cadcc1719928fc5ec3d68ce7a24de0';
	var $name = "Game";

	function index(){
		global $key;
		$owned = $this->Game->getOwned();
		$wanted = $this->Game->getWanted();
		$this->set('owned', $owned);
		$this->set('wanted', $wanted);
		$this->render();
	}

	function add(){
		if (!$this->RequestHandler->isPost()){
			$this->render();
		}
		else{
			$title = $this->data['Game']['title'];
			if ($this->Game->hasTitle($title)) {
				$this->Session->setFlash('We appear to already have this tile listed', 'flash_failure');
				$this->redirect(array('controller'=>'Game', 'action'=>'index'));
			}
			else {
				$this->Game->cakeAddGame($title);
				$this->Session->setFlash('Youve successfully added the new title', 'flash_success');
				$this->redirect(array('controller'=>'Game', 'action'=>'index'));
			}
		}
	}
}
