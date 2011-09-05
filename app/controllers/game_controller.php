<?php
class GameController extends AppController {

	protected static $key = '11cadcc1719928fc5ec3d68ce7a24de0';
	var $name = "Game";
	var $helpers = array('Html', 'Javascript');
	var $components = array('RequestHandler');

	function index(){
		global $key;
		$owned = $this->Game->getOwned();
		$wanted = $this->Game->getWanted();
		$this->set('owned', $owned);
		$this->set('wanted', $wanted);
		$this->set('cssIncludes', array('ui-lightness/jquery-ui-1.8.16.custom'));
		$this->set('jsIncludes', array('jquery-1.6.2.min', 'jquery-ui-1.8.16.custom.min', 'game'));
		$this->render();
	}

	function add(){
		if (!$this->RequestHandler->isPost()){
			$this->render();
		}
		else{
			$title = $this->data['Game']['title'];
			if ($this->Game->hasTitle($title)) {
				$this->Session->setFlash('We appear to already have this title listed', 'flash_failure');
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
