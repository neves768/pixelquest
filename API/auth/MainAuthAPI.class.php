<?php
namespace Nev;
class MainAuthAPI extends DepAPI {
	private $mainLogic;
	function __construct(){
		$this->init2();
		$this->mainLogic = new MainAuthLogic($this->auth, $this->dbc);
		$this->declares();
		$this->makeCall();
	}
	
	private function declares(){
		$this->fn["login"] = ["fn" => function(){
			$u = $_POST['u'] ?? false;
            $passw = $_POST['p'] ?? false;
            [$msg, $bool] = $this->auth->login($u, $passw);
			echo json_encode(["response" => $msg, "success" => $bool]);
		}, "methods" => ["POST" => true], "params" => ["u" => true], "norequired" => true];

        $this->fn["register"] = ["fn" => function(){
            $name = $_POST['name'] ?? false;
            $email = $_POST['email'] ?? false;
            $nick = $_POST['nick'] ?? false;
            $passw = $_POST['p'] ?? false;
            [$msg, $bool] = $this->auth->register($name, $email, $nick, $passw);
			echo json_encode(["response" => $msg, "success" => $bool]);
		}, "methods" => ["POST" => true], "params" => ["nick" => true], "norequired" => true];

		$this->fn["get/avatar"] = ["fn" => function(){
			echo json_encode(["response" => 'a', "success" => true]);
		}, "methods" => ["GET" => true]];
	}
}
?>