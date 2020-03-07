<?php
class ses{
	private $x;
	function __construct($x){
		$this->x = $x;
	}
	private function setSesOn(){
		$r = explode("|",(explode("<",$this->x))[1]);  
		session_start();
		$_SESSION['id']    = $r[0];
		$_SESSION['nome']  = $r[1];
		$_SESSION['email'] = $r[2];
		$_SESSION['img']   = $r[4];
		$_SESSION['on']    = $r[5] . " [" . date('Y-m-d') ."|". date('H:i:s')."]";
		//header("location:landpageweb");
		
	}
	
	private function setSesOff(){
		session_start();
		unset($_SESSION['id']);
		unset($_SESSION['nome']);
		unset($_SESSION['email']);
		unset($_SESSION['img']);
		unset($_SESSION['on']);
	}
	
	public function setData(){  
		if((explode("<",$this->x))[0] == "on"){ 
			$this->setSesOn();
			echo "on|vazio";
		} else {
			$this->setSesOff();
			echo "off|vazio";
		}
	}
}

class gerd{
	public static function getTxt($x){
		require_once("dm.php");
		$c = new dbC();
 		if($c->setDataUs($x) != 404){
			if(intval(explode("<",$c->setDataUs($x))) > 0){
				$s = new ses($c->setDataUs($x));
				$s->setData();
			} else {
			//	header("location:http://landpageweb");
				echo "404 ";
			}
		} else { echo "You not connect in Network..."; }
	}
	
	
	public static function getTxtUsFor($x){
		require_once("dm.php");
 		return dbC::setDataUs($x);
	}
	
	public static function getTxtPrFor($x){
		require_once("dm.php");
 		return dbC::setDataPr($x);
	}
	
	public static function getDP(){
		require_once("dm.php");
		return dbC::setD();
	}
}
	
 


?>