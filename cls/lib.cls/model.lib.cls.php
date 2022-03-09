<?php

//abstract 
class Model{

		private $ID;
		private $time_created;
		private $availability = 0;
		public $table = "model";
		public $msg;

	

	public function __construct($id){
		if($id==0){
			$this->create();
		}else{
			$this->setID($id);
		}
		$this->avail();
		$this->settime_created();

	}

	

	public function get_turple(){
		return $this->read('*');
	}



	



	private function setID($id){
		$this->ID = $id;
	}



	public function getID(){
		return $this->ID;
	}



	private function settime_created(){
		$this->time_created = $this->read('time_created');
	}



	public function gettime_created(){
		return $this->time_created;
	}



	function avail(){
	 $this->update($this->set("availability" , 1 ));
	 $this->setavailability(1);
	}



	function unvavail(){
	 $this->update($this->set("availability" , 0 ));
	 $this->setavailability(0);
	}



	private function setavailability($av){
		$this->availability = $av;
	}



	public function getavailability(){
		if( $this->availability === 1 ){
			return true;
		}elseif( $this->availability === 0 ){
			return false;
		}
	}


/*CRUD FUNCTIONS
 *
 */
/*CREATE FUNCTION*/
	protected function create(){

		include("./gen/connector.gen.php");
		$sql = "INSERT INTO $this->table ( availability ) 
				VALUES ( 0 )";
		if ($con->query($sql) === TRUE) {

   				$this->setID($con->insert_id);

   				$msg = "record created";
		} else {
   				$msg = 111;
		}

	return $msg;
	}

	



/*READ FUNCTION*/
	protected function read($attr){
		$id = $this->getID();
			include("./gen/connector.gen.php");
		$sql = "SELECT $attr 
				FROM $this->table
				WHERE id = $id";
		$result = $con->query($sql);
		$row = $result->fetch_assoc();
		
			if ($row) {
				if($attr=='*' || contains(',' , $attr ))
 			  		return $row;
 			  	else
 			  		return $row[$attr];
			} else {
			 return  111;
			}

			 return;
	}



/*UPDATE FUNCTION*/
	protected function update($set){
			include("./gen/connector.gen.php");
			$sql = "UPDATE $this->table 
					SET $set
					WHERE id = $this->ID";
			if ($con->query($sql) === TRUE) {
 			  $msg = "record updated";
			} else {
			  $msg = 111;
			}
		return $msg;
		}


public function set($attr , $val )
{
	return " $attr = $val ";
}

/*DELETE FUNCTION*/
	protected function delete(){
			include("./gen/connector.gen.php");
			$sql = "DELETE
					FROM $this->table
					WHERE id = $this->ID";

			if ($con->query($sql) === TRUE) {
 			  $msg = "record deleted";
			} else {
			  $msg = 111;
			}
		return $msg;
		}

// returns true if $needle is a substring of $haystack
}
?>
