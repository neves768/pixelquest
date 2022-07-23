<?php
namespace Nev;
class GameLogic{
	private $pdoDB;
	private $auth;
	public function __construct(&$auth, &$pdoDB){
		$this->auth = $auth;
		$this->pdoDB = $pdoDB;
	}
    public function getGameData($ID){
		$sql = "SELECT `ID`, `categID`, `name`, `description`, `listingType`, `rounds`, `icon`, `hasPass`, (SELECT `user` FROM `users` b WHERE `hash` = a.owner LIMIT 1) as `owner` FROM `games` a WHERE `ID` = :gmID LIMIT 1;";
		$sql = $this->pdoDB->prepare($sql);
		if($sql->execute(['gmID' => $ID])){
			return [$sql->fetch(\PDO::FETCH_OBJ), true];
		}
		return [[], false];
	}
    public function getGameRound($ID, $round){
		$sql = "SELECT * FROM `rounds` a WHERE `ID` = :rID AND `gameID` = :gmID LIMIT 1;";
		$sql = $this->pdoDB->prepare($sql);
		if($sql->execute(['gmID' => $ID, 'rID' => $round])){
			return [$sql->fetch(\PDO::FETCH_OBJ), true];
		}
		return [[], false];
	}
}
?>