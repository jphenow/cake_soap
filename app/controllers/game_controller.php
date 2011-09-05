<?php
/* The core class for this app
 * Allows for adding games, voting on games, marking as owned,
 * all regulated by a timed cookie
 * Model: /app/models/game.php
 * Views: /app/views/game/*
 */
class GameController extends AppController {
	
	var $name = "Game";
	var $helpers = array('Html', 'Javascript');
	var $components = array('RequestHandler', 'Cookie');

	/*
	 * The main Game page
	 * Used for viewing owned/wanted games as well as voting or marking as owned
	 */
	function index(){
		$owned = $this->data['Game']['moveOwned'];
		$vote = $this->data['Game']['vote'];
		// $owned and $vote are always 'set' by cake so we check length
		if(strlen($vote) > 0){
			if(!$this->_canAct()){// Always check cookie for action availability
				$this->_sendIndexMessage('You cannot use another action until 12am', 'flash_failure');
			}
			else { // Cast vote to model, mark cookie, send back to index with message
				$this->Game->castVote($vote);
				$this->_acted();
				$this->_sendIndexMessage('You successfully used your daily action', 'flash_success');
			}
		} // Again, check if $owned variable was set
		else if(strlen($owned) > 0){
			if(!$this->_canAct()){ // Check Cookie, send back with error if not
				$this->_sendIndexMessage('You cannot use another action until 12am', 'flash_failure');
			}
			else { // Set as owned, set cookie, send to index with flash message
				if( $this->Game->moveOwned(intval($owned)) ){
					$this->_acted();
					$this->_sendIndexMessage('You successfully used your daily action', 'flash_success');
				} // Anticipate possible error with false return on moveOwned() send back with message
				else $this->_sendIndexMessage('The action failed for some reason, try again', 'flash_failure');
			}
		}
		else { // Nothing posted to form, load the standard page
			$owned = $this->Game->getOwned();
			$wanted = $this->Game->getWanted();
			$this->set('owned', $owned); // set vars for view
			$this->set('wanted', $wanted);
			$this->set('cssIncludes', array('ui-lightness/jquery-ui-1.8.16.custom')); // Page specific css and js
			// both css and js reside in /app/webroot/{css,js}
			$this->set('jsIncludes', array('jquery-1.6.2.min', 'jquery-ui-1.8.16.custom.min', 'game'));
			$this->render(); // renders /app/views/game/index.ctp
		}
	}
	
	/* Clear games
	 * No real page for rendering exists, just sends back to index after 
	 * clearing
	 */
	function clear(){
		if($this->Game->cakeClearGames()){
			$this->_sendIndexMessage('Successfully cleared games', 'flash_success');
		} // Anticipate possible, unforseen error
		else $this->_sendIndexMessage('Error occurred, please try again', 'flash_failure');
	}

	/* Add Games page
	 * if its a post, will check presense of title and ability to do daily action
	 * otherwise will send to standard page for adding a game
	 */
	function add(){
		$title = $this->data['Game']['title'];
		if(strlen($title) > 0){
			if ($this->Game->hasTitle($title)) { // Simple attempt to see if we already own title
				$this->_sendIndexMessage('We appear to already have this title listed', 'flash_failure');
			}
			else { // We don't think we own it, try adding
				if($this->_canAct()){ // Check cookie
					if($this->Game->cakeAddGame($title)){
						$this->_acted();
						$this->_sendIndexMessage('You successfully added the new title', 'flash_success');
					} // To be safe check return of add attemp
					else $this->_sendIndexMessage('Error occurred, please try again', 'flash_failure');
				}
				else { // Not able to perform actions for remainder of day
					$this->_sendIndexMessage('You cannot use another action until 12am', 'flash_failure');
				}
			}
		}
		else { // Title in form not set
			if(!$this->_canAct()){ // No form submitted, but try preemtively warning user of inability to act
				$this->Session->setFlash('You cannot use another action until 12am', 'flash_failure');
			}
			$this->render(); // Renders /app/views/game/add.ctp
		}
	}

	/* Executed before each action
	 * Currently just sets Cookie
	 * TODO consider moving action loose-end-tying to this method
	 */
	function beforeFilter(){
		$this->Cookie->name = 'action_limit';
		$this->Cookie->time = 60;
		$this->Cookie->domain = 'dev.jphenow.com';
		$this->Cookie->secure = false;
		$this->Cookie->key = 'cTdh9UajAWVi';
	}

	/* Personal helper for setting flash and sending to Game index
	 */
	function _sendIndexMessage($message, $flash){
		$this->Session->setFlash($message, $flash);
		$this->redirect(array('controller'=>'Game', 'action'=>'index'));
	}

	/* Personal helper for setting Cookie so we can
	 * check if the user has performed an action today
	 */
	function _acted(){
		$this->Cookie->write('action', 'true');
	}

	/* Checks Cookie for whether user has acted yet today
	 */
	function _canAct(){
		if($this->Cookie->read('action')){
			return false;
		}
		else return true;
	}
}
