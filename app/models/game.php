<?php
/* Model for the game
 * SOAP attachment taken care of by soapsource:
 * /app/models/datasources/soapsource.php
 * Main config: /app/config/database.php under var $soap
 * $useDbConfig and $useTable mark that we use soapsource
 *
 * Repository/Documentation: https://github.com/Pagebakers/soapsource
 *
 * Model made for ease of interaction with SOAP source for controller
 *
 * Views: /app/views/game/*
 * Controller: /app/controllers/game_controller.php
 *
 * @author Jon Phenow <j.phenow@gmail.com>
 */
class Game extends AppModel {
	// Key given with project definition
	private static $KEY = '';
	private static $OWNED = 'gotit';
	private static $WANT = 'wantit';
	var $useDbConfig = 'soap'; // Using soap 'db' method
	var $useTable = false;

	/*
	 * Grab games that are marked as owned by SOAP service
	 */
	function getOwned() {
		return $this->getSpecificGames(self::$OWNED);
	}

	/*
	 * Get games marked as wanted by SOAP service
	 */
	function getWanted() {
		return $this->getSpecificGames(self::$WANT);
	}

	/* Check, somewhat simply, if service already has record of certain title
	 * @param $title title being tested
	 * @return boolean if title is already owned
	 */
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

	/* Set certain title as owned based on ID
	 * @param $id required by SOAP service to move to 'gotit'
	 * @return if SOAP service accepted the query
	 */
	function moveOwned($id){
		return $this->setGotIt(array(self::$KEY, $id));
	}

	/* Vote up a certain title
	 * @param $id id of title to vote on
	 */
	function castVote($id){
		return $this->addVote(array(self::$KEY, $id));
	}

	/*
	 * Clear current list of games, all owned/wanted entries are deleted
	 * @return if SOAP service accepted the change
	 */
	function cakeClearGames(){
		return $this->clearGames(array(self::$KEY));
	}

	/* Add game to list
	 * We'll allow controller to take care of duplicate check
	 * @param $title title being added.
	 * @return status return from SOAP submit
	 */
	function cakeAddGame($title) {
		return $this->addGame(array(self::$KEY, $title));
	}

	/* Internal help function for getting all games from SOAP
	 * @return status from SOAP return
	 */
	private function cakeGetGames() {
		return $this->getGames(array(self::$KEY));
	}

	/* Get games based on given condition
	 * @param $condition condion to use in test, for which status of game to get
	 * @return set of games matching condition
	 */
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
