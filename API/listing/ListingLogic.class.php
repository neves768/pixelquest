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
        $sql = "SELECT `ID`, `categID`, `name`, `description`, `listingType`, `hasPass`, `owner` FROM `games` WHERE `owner` = :ownerHash;";
		$sql = $this->pdoDB->prepare($sql);
		if($sql->execute(["catID" => $cat])){
			return [$sql->fetchAll(\PDO::FETCH_OBJ), true];
		}
		return [[], false];
    }

    public function getCategory($cat){
        if($cat == 0) return getMyGames();
		$sql = "SELECT `ID`, `categID`, `name`, `description`, `listingType`, `hasPass`, `owner` FROM `games` WHERE categID = :catID;";
		$sql = $this->pdoDB->prepare($sql);
		if($sql->execute(["catID" => $cat])){
			return [$sql->fetchAll(\PDO::FETCH_OBJ), true];
		}
		return [[], false];
	}
}
?>