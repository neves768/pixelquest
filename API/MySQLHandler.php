<?php
namespace Nev;
if(file_exists(__DIR__."/impKeys.php")){require_once("impKeys.php");}
define('_RDSC_host', $_SERVER['RDSC_host'] ?? 'localhost'); 
define('_RDSC_user', $_SERVER['RDSC_user'] ?? 'root'); 
define('_RDSC_pass', $_SERVER['RDSC_pass'] ?? '123'); 

class DataBase{
    private $pdoConnection;
    function __construct(){
		$this->pdoConnection = new \PDO("mysql:host="._RDSC_host.";dbname=pixelquest", _RDSC_user, _RDSC_pass);
		$this->pdoConnection->exec("set names utf8");
		$this->pdoConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
	
    public function getDBConnection(){
        return $this->pdoConnection;
    }
}
?>