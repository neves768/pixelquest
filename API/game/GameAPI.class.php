<?php
namespace Nev;
class GameAPI extends DepAPI {
	private $mainLogic;
	function __construct(){
		$this->init2();
		$this->mainLogic = new GameLogic($this->auth, $this->dbc);
		$this->declares();
		$this->makeCall();
	}
	
	private function declares(){
		$this->fn["gameDt"] = ["fn" => function(){
			$id = $_GET['id'] ?? false;
            [$msg, $bool] = $this->mainLogic->getGameData($id);
			echo json_encode(["response" => $msg, "success" => $bool]);
		}, "methods" => ["GET" => true], "params" => ["id" => true]];
		
        $this->fn["round"] = ["fn" => function(){
			$id = $_GET['id'] ?? false;
			$round = $_GET['round'] ?? false;
            [$msg, $bool] = $this->mainLogic->getGameRound($id, $round);
            unset($msg->reply);
			echo json_encode(["response" => $msg, "success" => $bool]);
		}, "methods" => ["GET" => true], "params" => ["id" => true]];

        $this->fn["image"] = ["fn" => function(){
			$id = $_GET['id'] ?? false;
            [$msg, $bool] = $this->mainLogic->getGameData($id);
            if($bool){
                [$dt, $bool] = $this->mainLogic->getGameRound($id, 1);
                $logo1 = imagecreatefromjpeg($dt->picture);
                $output = imagecreatetruecolor(imagesx($logo1), imagesy($logo1));
                imagefilter($logo1, IMG_FILTER_PIXELATE, 100);
                imagecopy($output, $logo1, 0, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
                imagedestroy($logo1);
                header('Content-Type: image/jpeg');
                imagepng($output);
                imagedestroy($output);
            }
		}, "methods" => ["GET" => true], "params" => ["id" => true]];
	}
}
?>