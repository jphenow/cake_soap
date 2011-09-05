<?php
class GameController extends AppController {

	var $name = "Game";
	var $helpers = array('Html', 'Javascript');
	var $components = array('RequestHandler');

	function index(){
		if (!$this->RequestHandler->isPost()){
			$owned = $this->Game->getOwned();
			$wanted = $this->Game->getWanted();
			$this->set('owned', $owned);
			$this->set('wanted', $wanted);
			$this->set('cssIncludes', array('ui-lightness/jquery-ui-1.8.16.custom'));
			$this->set('jsIncludes', array('jquery-1.6.2.min', 'jquery-ui-1.8.16.custom.min', 'game'));
			$this->render();
		}
		else if(!is_null($this->data['Game']['vote'])){
			$this->Game->castVote(intval($this->data['Game']['vote']));
			$this->Session->setFlash('You successfully used your daily action', 'flash_success');
			$this->redirect(array('controller'=>'Game', 'action'=>'index'));
		}
		else if(!is_null($this->data['Game']['move_owned'])){

		}
	}

	function clear(){
		$this->Game->cakeClearGames();
		$this->redirect(array('controller'=>'Game', 'action'=>'index'));
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
				$this->Session->setFlash('You successfully added the new title', 'flash_success');
				$this->redirect(array('controller'=>'Game', 'action'=>'index'));
			}
		}
	}
}
