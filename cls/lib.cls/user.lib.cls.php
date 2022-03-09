<?php
/*
 *
 */

class User extends Model{

		private $fname;
		private $lname;
		private $uname;
		private $pwd;
		private $email;

		public $table = "users";
		/*$Up_Sel_FlagThis is to check if it should be updated 1 or selected 0*/

		public function __construct($id , $uname , $pwd , $lname , $fname , $email , $Up_Sel_Flag){
			Model::__construct($id);
			$set = "";
			if( $Up_Sel_Flag==1 || $id==0 ){

			$set .= $this->set("`firstname`" , $this->makeStr($fname)).",";
			$this->fname = $fname;
			$set .= $this->set("`lastname`" , $this->makeStr($lname)).",";
			$this->lname = $lname;
			$set .= $this->set("`userName`" , $this->makeStr($uname)).",";
			$this->uname = $uname;
			$set .= $this->set("`passWord`" , $this->makeStr($pwd)).",";
			$this->pwd = $pwd;
			$set .= $this->set("`email`" , $this->makeStr($email));
			$this->email = $email;

			echo $this->update($set);
			$this->pwd = $pwd;
		    } else {
		    	$row =$this->read('*');
			$this->fname = $row["firstname"];
			$this->lname = $row["lastname"];
			$this->uname = $row["userName"];
			$this->pwd = $row["passWord"];
			$this->email = $row["email"];
		    }

			echo "This is the User class";
		}



		private function setfname(){
			$this->fname = $this->read('firstname');
		}



		public function getfname(){
			return $this->fname;
		}



		private function setlname(){
			$this->lname = $this->read('lastname');
		}



		public function getlname(){
			return $this->lname;
		}



		private function setuname(){
			$this->uname = $this->read('userName');
		}



		public function getuname(){
			return $this->uname;
		}



		private function setpwd(){
			$this->pwd = $this->read('passWord');
		}



		public function getpwd(){
			return $this->pwd;
		}


		private function setemail(){
			$this->email = $this->read('email');
		}



		public function getemail(){
			return $this->email;
		}


		public function makeStr($val)
		{
			return "\"".$val."\"";
		}


		

}

?>