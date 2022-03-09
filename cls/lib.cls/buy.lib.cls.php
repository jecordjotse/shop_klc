
<?php

class buy extends model{

	private $PID;
	private $cusID;
	private $qty;
	public $table = "buys";

	public function __construct(){
		

	}
	public function getBuy($PID , $cusID){
		$this->setPID($PID);
		$this->setcusID($cusID);
		$this->bread();
	}

	function add($PID , $cusID , $qty){
		$this->bcreate($PID , $cusID , $qty);
		$this->setPID($PID);
		$this->setcusID($cusID);
		$this->setqty($qty);
		$this->bread();
	}

	private function setqty($qty){
			$this->qty = $qty;
		}


	public function getqty(){
			return $this->qty;
		}

	private function setPID($PID){
			$this->PID = $PID;
		}


	public function getPID(){
			return $this->PID;
		}



	private function setcusID($cusID){
			$this->cusID = $cusID;
		}


	public function getcusID(){
			return $this->cusID;
		}


	protected function bcreate($PID , $cusID ,$qty){

		include("./gen/connector.gen.php");
		$sql = "INSERT INTO $this->table ( PID , cusID , availability , qty) 
				VALUES ( '$PID' , '$cusID' , 0 , '$qty')";
				echo $sql;
		if ($con->query($sql) === TRUE) {
   				$msg = "record created";
		} else {
   				$msg = 111;
		}

	echo $msg;
	}

	protected function bread(){
			include("./gen/connector.gen.php");
		$sql = "SELECT * 
				FROM $this->table
				WHERE PID = $this->PID
				AND cusID = $this->cusID";
		$result = $con->query($sql);

		if ($row = $result->fetch_assoc()){
			$this->time_created = $row['time_created'];
			$this->availability = $row['availability'];
		}
 		
	}


	protected function update($set){
			include("./gen/connector.gen.php");
			$sql = "UPDATE $this->table 
					SET $set
					WHERE PID = $this->PID
					AND cusID = $this->cusID";

			if ($con->query($sql) === TRUE) {
 			  $msg = "record updated";
			} else {
			  $msg = 111;
			}
		return $msg;
	}



	protected function delete(){
			include("./gen/connector.gen.php");
			$sql = "DELETE
					FROM $this->table
					WHERE PID = $this->PID
					AND cusID = $this->cusID";

			if ($con->query($sql) === TRUE) {
 			  $msg = "record deleted";
			} else {
			  $msg = 111;
			}
		return $msg;
	}


	public function buyPro(){		
		$this->update("availability = 1");
		$this->availability = 1;
	}

	public function rem(){
		$this->delete();
	}

	public function gettable(){
		return 'buys';
	}
}

?>