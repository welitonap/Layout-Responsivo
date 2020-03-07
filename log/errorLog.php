<?php

trait log_erro{
	public static function log($err){
		error_log("Log: ERRORLOG_PHP L5 [". date("Y/m/d") . "|" . date("H:i:s") ."]|$a|$v|$c|$d|$e \n",3,"log/landpageweb.log");
	}
}

function setDbCone($a,$b,$c,$d,$e){
	error_log("Failed to connect database! [". date("Y/m/d") . "|" . date("H:i:s") ."]|$a|$v|$c|$d|$e \n",3,"log/landpageweb.log");
}


function setDbLogin($a,$b,$c,$d,$e){
	//echo "Erro LOGIN \n";
	error_log("Failed LOGIN  [". date("Y/m/d") . "|" . date("H:i:s") ."]|$a|$b|$c|$d|$e \n",3,"log/landpageweb.log");
//	$c = new log();
//	$c->getLog2();
}

function setDataDuplicado($a,$b,$c,$d,$e){ 
	error_log("Data Duplicado! [". date("Y/m/d") . "|" . date("H:i:s") ."]|$a|$b|$c|$d|$e \n",3,"log/landpageweb.log");
//	$c = new log();
//	$c->getLog3();
}
function setDataError($a,$b,$c,$d,$e){
//	echo "Erro LOGIN \n";
	error_log("Data Duplicado! [". date("Y/m/d") . "|" . date("H:i:s") ."]|$a|$b|$c|$d|$e  \n",3,"log/landpageweb.log");
//	$c = new log();
//	$c->getLog3();
}
class logError{
	private $txt;
	private $int;
	public function __construct($x){
		if($x == "txt"){ $this->getLog(); }
		if($x == "int"){ $this->getNumber(); }
	}
	public function getResp(){
		return $this->txt;
	}
	public function getNumber(){
		return $this->int;
	}
 	private function getLog(){
		if(file_exists("log/dataLog.log")){
			$file = file("log/dataLog.log");
			if(count($file) > 0){				
				$this->txt =  (explode("}",$file[(count($file))-2]))[1] . " / " .(explode(":",trim($file[(count($file))-7])))[2];
				$this->int = " LINE:". (explode(":",trim($file[(count($file))-7])))[3]  . " / ". (count($file));
			} else{
				$this->txt = "";
				$this->int =  "";
			}
		} else {
			echo "<h2 style='color:red;'>File not found</h2>";
		}
	}
}
?>


