
<?php

class customer extends Model{

	private $fname;
	private $lname;
	private $DOB;
	private $addr;
	private $number;
	private $uname;
	private $pwd;
	private $email;
	private $shoe_size;
	private $pant_size;
	private $shirt_size;
	private $suit_size;
	public $table = "customers";

	public function __construct($id){
		Model::__construct($id);
		if($id != 0){
			$this->shoe_size();
			$this->pant_size();
			$this->shirt_size();
			$this->suit_size();
		}
	}

	public function setfname($fname){
			$this->update("firstname = $fname");
			$this->fname();
		}


	private function fname(){
			$this->fname = $this->read('firstname');
		}


	public function getfname(){
			return $this->fname;
		}



	public function setlname($lname){
			$this->update("lastname = $lname");
			$this->lname();
		}


	private function lname(){
			$this->lname = $this->read('lastname');
		}


	public function getlname(){
			return $this->lname;
		}



	public function setDOB($DOB){
			$this->update("date_of_birth = $DOB");
			$this->DOB();
		}


	private function DOB(){
			$this->DOB = $this->read('date_of_birth');
		}


	public function getDOB(){
			return $this->DOB;
		}



	public function setaddr($addr){
			$this->update("address = $addr");
			$this->addr();
		}


	private function addr(){
			$this->addr = $this->read('address');
		}


	public function getaddr(){
			return $this->addr;
		}




	public function setnumber($number){
			$this->update("number = $number");
			$this->number();
		}


	private function number(){
			$this->number = $this->read('number');
		}


	public function getnumber(){
			return $this->number;
		}




	public function setemail($email){
			$this->update("email = $email");
			$this->email();
		}


	private function email(){
			$this->email = $this->read('email');
		}


	public function getemail(){
			return $this->email;
		}




	public function setshoe_size($shoe_size){
			$this->update("shoe_size = $shoe_size");
			$this->shoe_size();
		}


	private function shoe_size(){
			$this->shoe_size = $this->read('shoe_size');
		}


	public function getshoe_size(){
			return $this->shoe_size;
		}




	public function setpant_size($pant_size){
			$this->update("pant_size = $pant_size");
			$this->pant_size();
		}


	private function pant_size(){
			$this->pant_size = $this->read('pant_size');
		}


	public function getpant_size(){
			return $this->pant_size;
		}




	public function setshirt_size($shirt_size){
			$this->update("shirt_size = $shirt_size");
			$this->shirt_size();
		}


	private function shirt_size(){
			$this->shirt_size = $this->read('shirt_size');
		}


	public function getshirt_size(){
			return $this->shirt_size;
		}




	public function setsuit_size($suit_size){
			$this->update("suit_size = $suit_size");
			$this->suit_size();
		}


	private function suit_size(){
			$this->suit_size = $this->read('suit_size');
		}


	public function getsuit_size(){
			return $this->suit_size;
		}




	public function getProducts(){
		 $table = buy::gettable();
		 $id = $this->getID();
			include("./gen/connector.gen.php");
		$sql = "SELECT `buys`.`PID` , `buys`.`cusID` , `buys`.`qty` , `buys`.`time_created` as btc ,
					   `products`.`name` , `products`.`description` , `products`.`color_desc` , 
					   `products`.`price` , `products`.`time_created` AS ptc 
				FROM `$table` , `products` 
				WHERE `buys`.`availability` = 0 
				AND `buys`.`PID` = `products`.`id` 
				AND `buys`.`cusID` = $id";

		$result = $con->query($sql);
		$arr = array();
		while($row = $result->fetch_assoc()){
			array_push($arr , $row);
		}
 		return $arr;
	}


	public function getBought(){
		 $table = buy::gettable();
		 $id = $this->getID();
			include("./gen/connector.gen.php");
		$sql = "SELECT * 
				FROM $table
				WHERE availability = 1
				AND cusID = $id";

		$result = $con->query($sql);
		$arr = array();
		while($row = $result->fetch_assoc()){
			array_push($arr , $row['PID']);
		}
 		return $arr;
	}

	public function add2Cart($PID , $qty){
		$cart = new buy();
		$id = $this->getID();
		$cart->add($PID , $id , $qty );
	}

	public function removeCart($PID){
		$cart = new buy();
		$cart->getBuy($PID , $this->getID());
		$cart->rem();
	}

	public function buy($PID){
		$cart = new buy();
		$cart->getBuy($PID , $this->ID);
		$cart->buyPro();
	}

	public function getPro(){
			include("./gen/connector.gen.php");
		$sql = "SELECT id
				FROM products";

		$result = $con->query($sql);
		$arr = array();
		while($row = $result->fetch_assoc()){
			$prod = new product($row['id']); 
			array_push($arr , $prod);
		}
 		return $arr;
	}
}

?>