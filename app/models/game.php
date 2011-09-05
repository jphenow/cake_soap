<?php
class Game extends AppModel {
	private static $KEY = '11cadcc1719928fc5ec3d68ce7a24de0';
	private static $OWNED = 'gotit';
	private static $WANT = 'wantit';
	var $useDbConfig = 'soap';
	var $useTable = false;

	function getOwned() {
		return $this->getSpecificGames(self::$OWNED);
	}

	function getWanted() {
		return $this->getSpecificGames(self::$WANT);
	}

	function hasTitle($title) {
		$title_lower = strtolower($title);
		$games = $this->cakeGetGames();
		foreach ($games as $game) {
			if (strtolower($game->title) == $title_lower) {
				return true;
			}
		}
		return false;
	}

	function cakeClearGames(){
		return $this->clearGames(array(self::$KEY));
	}

	function cakeAddGame($title) {
		$this->addGame(array(self::$KEY, $title));
	}

	private function cakeGetGames() {
		return $this->getGames(array(self::$KEY));
	}

	private function getSpecificGames( $condition ) {
		$games = $this->cakeGetGames();
		$keep = array();
		foreach ($games as $game) {
			if ($game->status == $condition) {
				$keep[] = $game;
			}
		}
		return $keep;
	}
}
?>
