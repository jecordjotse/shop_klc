
<?php

class productImg extends model{

	private $PID;
	private $loc;
	public $table = 'productImg';

	public function __construct($id , $PID , $loc , $Upload){
		Model::__construct($id);
		if($id != 0 || $Upload == false){
			$this->PID();
			$this->loc();
		}else{
			$this->setloc($loc);
			$this->setPID($PID);
		}

	}

	public function setloc($loc){
			$this->update("loc = '$loc'");
			$this->loc();
		}


	private function loc(){
			$this->loc = $this->read("loc");
		}


	public function getloc(){
			return $this->loc;
		}


	public function setPID($PID){
			$this->update("PID = '$PID'");
			$this->PID();
		}


	private function PID(){
			$this->PID = $this->read("PID");
		}


	public function getPID(){
			return $this->PID;
		}

}

?>