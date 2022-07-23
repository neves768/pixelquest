<?php
namespace Nev;
class ListingLogic{
	private $pdoDB;
	private $auth;
	public function __construct(&$auth, &$pdoDB){
		$this->auth = $auth;
		$this->pdoDB = $pdoDB;
	}

    public function getCategories(){
		$sql = "SELECT * FROM `categories`;";
		$sql = $this->pdoDB->prepare($sql);
		if($sql->execute()){
			return [$sql->fetchAll(\PDO::FETCH_OBJ), true];
		}
		return [[], false];
	}

    public function getMyGames(){
        $sql = "SELECT `ID`, `categID`, `name`, `description`, `listingType`, `rounds`, `icon`, `hasPass`, (SELECT `user` FROM `users` WHERE `hash` = :ownerHash LIMIT 1) as `owner` FROM `games` WHERE `owner` = :ownerHash;";
		$sql = $this->pdoDB->prepare($sql);
		if($sql->execute(["ownerHash" => $this->auth->myHash()])){
			return [$sql->fetchAll(\PDO::FETCH_OBJ), true];
		}
		return [[], false];
    }

    public function getCategoryGames($cat){
        if($cat == 0) return $this->getMyGames();
		$sql = "SELECT `ID`, `categID`, `name`, `description`, `listingType`, `rounds`, `icon`, `hasPass`, (SELECT `user` FROM `users` b WHERE `hash` = a.owner LIMIT 1) as `owner` FROM `games` a WHERE categID = :catID;";
		$sql = $this->pdoDB->prepare($sql);
		if($sql->execute(["catID" => $cat])){
			return [$sql->fetchAll(\PDO::FETCH_OBJ), true];
		}
		return [[], false];
	}
}
?>