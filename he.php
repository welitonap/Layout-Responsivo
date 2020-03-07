<?php
 
class dataPr{
	public static function getPro(){
		require_once("phpbi/dnec.php");
//		$c = new gerd();
		return gerd::getDP();
	}
}


if(!empty($_POST['data'])){ 
	require_once("phpbi/dnec.php");
	try{
		switch((explode("|",$_POST['data']))[0]){
			case "logi":
				gerd::getTxt($_POST['data']);
				break;
			case "loginOff":
				gerd::getTxt($_POST['data']);
				break;
				
			case "fr":
			case "fu":
//			case "me":			
			case "fs":
			case "fc":
			case "fu":
			case "fd":
			case "frD":
//				echo gerd::getTxtForm1("sss");
				echo gerd::getTxtUsFor($_POST['data']);
				break;
			 
			case "pr":
			case "pu":
			case "pc":
			case "pd":
			case "ps":
//				echo gerd::getTxtForm1("sss");
				echo gerd::getTxtPrFor($_POST['data']);
				break;
			default:
				throw new Exception("HE SWITCH L22. value incorrenct, ");
				break;
		}
	} catch(Exception $a){
		error_log( $a . "[HE PHP ".date("Y/m/d") ."|". date("H:i:s"). "]\n",3,"log/dataLog.log");
	}
}

?>
 
