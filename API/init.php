<?php
/**************************************************
===================================================
					PixelQuest
===================================================
***************************************************/
require_once("MySQLHandler.php");
require_once("SessionHandler.php");
require_once("DepAPI.class.php");
$init = new \Nev\DepAPI($_GET['branch']);
?>