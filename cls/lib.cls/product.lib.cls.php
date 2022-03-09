
<?php

class product extends model{

	private $name;
	private $desc;
	private $price;
	private $colorDesc;
	public $table = "products";
	private $photos;
		

	public function __construct($id){
		Model::__construct($id);
		if($id != 0){
			$this->name();
			$this->desc();
			$this->price();
			$this->colorDesc();
			$this->setPhotos($this->Photos());
		}
	}

	public function setname($name){
			$this->update("name = '$name'");
			$this->name();
		}


	private function name(){
			$this->name = $this->read('name');
		}


	public function getname(){
			return $this->name;
		}

	public function setdesc($desc){
			$this->update("description = '$desc'");
			$this->desc();
		}


	private function desc(){
			$this->desc = $this->read('description');
		}


	public function getdesc(){
			return $this->desc;
		}

	public function setprice($price){
			$this->update("price = '$price'");
			$this->price();
		}


	private function price(){
			$this->price = $this->read('price');
		}


	public function getprice(){
			return $this->price;
		}

	public function setcolorDesc($colorDesc){
			$this->update("color_desc = '$colorDesc'");
			$this->name();
		}


	private function colorDesc(){
			$this->name = $this->read('color_desc');
		}


	public function getcolorDesc(){
			return $this->colorDesc;
		}

	private function Photos(){		
		include("./gen/connector.gen.php");
		$id = $this->getID();
		$sql = "SELECT *
				FROM productImg
				WHERE PID = $id";
		$result = $con->query($sql);
		$arr = array();
		while($row = $result->fetch_assoc()){
			//$prod = new productImg( $row['id'] , $row['PID'] , $row['loc'] , false); 
			array_push($arr , $row);
		}

 		return $arr;
		}


	public function Photo($loc){
			$id = $this->getID();
			echo $id;
			$prod = new productImg( 0 , $id , $loc , true ); 
			$this->setPhotos($this->Photos());
		}

	public function setPhotos($arr){
		$this->photos = $arr;
	}

	public function getPhotos(){
		return $this->photos;
	}

	public function rem(){
		$this->delete();
	}
}

?>