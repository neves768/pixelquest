<?php
namespace Nev;
class DepAPI {
	private $folders = [
		"AUT" => "auth",
		"GAM" => "game",
		"LIST" => "listing",
	];
	
	const Sha1Key = "45A65!@#$!¨$";
	const CookieName = "sessID";
	const bCrypt_Cost = 10;

	protected $fn = [];
	protected $auth;
	protected $method;
	protected $path;
	protected $dbc;
	function __construct($folderPath){
		header("Content-Type: application/json;charset=utf-8");
		$this->declareFns($folderPath);
	}

	protected function init2(){
		$db = new DataBase();
		$this->dbc = $db->getDBConnection();
        $this->auth = new SessionHandler($this->dbc, self::CookieName, self::Sha1Key);
		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->path = $_GET['path'];
	}
	
	protected function init(){
		$db = new DataBase();
		$this->dbc = $db->getDBConnection();
		$this->auth = new SessionHandler($this->dbc, self::CookieName, self::Sha1Key);

		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->path = $_GET['path'];

		$this->makeCall();
	}
	
	protected function makeCall(){
		if(isset($this->fn[$this->path])){
			if(!isset($this->fn[$this->path]["norequired"])){				
				if(!$this->auth->isLoggedIn()){
					exit(json_encode(["response" => "Not authorized", "success" => false]));
				}
			}
			if(isset($this->fn[$this->path]["methods"][$this->method])){
				if(isset($this->fn[$this->path]["params"])){
					foreach($this->fn[$this->path]["params"] as $param => $bool){
						if($this->method == "POST"){
							if(!isset($_POST[$param])){
								die(json_encode(["response" => "MISSING PARAMETERS", "success" => false]));
								return false;
							}
						} else {
							if(!isset($_GET[$param])){
								die(json_encode(["response" => "MISSING PARAMETERS", "success" => false]));
								return false;
							}
						}
					}
				}
				$this->fn[$this->path]["fn"]();
			} else {
				die(json_encode(["response" => "INVALID REQUEST TYPE", "success" => false]));
			}
		} else {
			die(json_encode(["response" => "METHOD NOT FOUND", "success" => false]));
		}
	}
	
	private function declareFns($folderPath){
		$path = $this->folders[$folderPath] ?? false;
		if($path){
			require_once($path."/init.php");
		} else {
			return false;
		}
	}
}
?>