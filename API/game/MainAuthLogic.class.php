<?php
namespace Nev;
class MainAuthLogic{
	private $pdoDB;
	private $auth;
	public function __construct(&$auth, &$pdoDB){
		$this->auth = $auth;
		$this->pdoDB = $pdoDB;
	}
    public function getUserCardData(){
		$sql = "SELECT `nickname`, `avatar` FROM `#sb_users` WHERE `identi` = :hsh LIMIT 1;";
		$sql = $this->pdoDB->prepare($sql);
		if($sql->execute(['hsh' => $this->user->uhash])){
			return [$sql->fetch(\PDO::FETCH_OBJ), true];
		}
		return [[], false];
	}

	public function getMyAvatar(){
		$sql = "SELECT `avatar` FROM `#sb_users` WHERE `identi` = :hsh LIMIT 1;";
		$sql = $this->pdoDB->prepare($sql);
		if($sql->execute(['hsh' => $this->user->uhash])){
			return $sql->fetch(\PDO::FETCH_OBJ)->avatar;
		}
		return [];
	}
	
	public function getAvatarFromNick($nick = ""){
		$qry = $this->pdoDB->prepare("SELECT `avatar` FROM `#sb_users` WHERE `nickname` = :nick LIMIT 1");
		if($qry->execute(['nick' => $nick])){
			$qry = $qry->fetch(\PDO::FETCH_OBJ);
			return $qry->avatar ?? 0;
		}
		return 0;
	}
}
?>