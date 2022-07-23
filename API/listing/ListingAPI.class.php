<?php
namespace Nev;
class ListingAPI extends DepAPI {
	private $mainLogic;
	function __construct(){
		$this->init2();
		$this->mainLogic = new ListingLogic($this->auth, $this->dbc);
		$this->declares();
		$this->makeCall();
	}
	
	private function declares(){
		$this->fn["categories"] = ["fn" => function(){
            [$categs, $bool] = $this->mainLogic->getCategories();
			echo json_encode(["response" => $categs, "success" => $bool]);
		}, "methods" => ["GET" => true], "params" => []];
		
        $this->fn["games"] = ["fn" => function(){
            $cat = $_GET["cat"] ?? 0;
            [$categs, $bool] = $this->mainLogic->getCategoryGames($cat);
			echo json_encode(["response" => $categs, "success" => $bool]);
		}, "methods" => ["GET" => true], "params" => []];
	}
}
?>