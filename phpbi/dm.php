<?php
// SELECT TOOL
trait logToo{
	public function __construct(){
		self::setFileLog();
	}
	protected static function setLog(){
//		self::setFileLog();
	}
	private static function setFileLog(){
		$t = self::$log . "[" . date("Y/m/d") . "|" . date("Y/m/d") . "]\n\n";
		error_log($t,3,"log/dataLog.log");
	}
	private function logFile(){
		if(file_exists("log/landpageweb.log")){
			$file = file("log/landpageweb.log");
			if(count($file) > 0){		
				$this->txt = (explode("]",trim($file[(count($file))-1])))[0];
				$this->int =  "LINE:". (explode("|",$file[(count($file))-1]))[5]  . " / ". (count($file));
			} else {
				$this->txt = "";
				$this->int =  "";
			}
		}
	}
}

// GET NAME VAR
trait getVar{
	protected static $database = "landpage";
	protected static $host;
	protected static $conn;
	protected static $ve;
	protected static $id;
	protected static $name;
	protected static $Dname;
	protected static $email;
	protected static $passwd;
	protected static $Dpasswd;
	protected static $type;
	protected static $priv;
	protected static $img;
	protected static $statu;
	protected static $table;
	protected static $log;
	protected static $res;
	protected static $sql;
	protected static $files;
	protected static $txt;
	protected static $tf;
	protected static $cod;
	protected static $quan;
	protected static $scu;
	protected static $txtDataUs;
}
// SET DATA OF PRODUTO
trait getPro{
	
}

trait getDb{
	use getVar;
	private static function getUserd(){ 
		self::$host = "localhost";
		self::$Dname = "wap";
		self::$Dpasswd = 12345678;
	}
	private static function setDb(){
		self::getUserd();
		$c = new mysqli(self::$host,self::$Dname,self::$Dpasswd,"landpage");
		if($c->connect_error){ return 0; } else { return 1;
//			if($c->query("CREATE DATABASE landpage4") === true){
//				$c->query("USE landpage2");
//				if($c->query("CREATE TABLE users(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//			                             nome VARCHAR(20),
//										 passwd VARCHAR(20),
//										 email VARCHAR(25),
//										 tipo VARCHAR(3),
//										 priv INT,
//										 img VARCHAR(20),
//										 statu VARCHAR(10),
//										 onoff VARCHAR(3))")){
//					if($c->query("INSERT INTO users(nome,passwd,email,tipo,priv,img,statu,onoff)
//					                       VALUE('user',123,'email','tipo',3,'ver_img.svg','statu','off')")){ echo "DB OK"; }
//				}
//			}
		}
		$c->close();
	}
	// VERIFIC CONECT
	protected static function setConect(){ 
		self::setDb();
		self::getUserd();
		set_error_handler("setDataDb");
		$c = new mysqli(self::$host,self::$Dname,self::$Dpasswd);
		if($c->connect_error){
			self::$log = "Erro Connect";
			self::setLog();
			self::setDb(); // CREATE DATABASE
			return 0;
		}
 
		return 1;
		$c->close();
	}
	// REQUIRE CONECT TO THE DB
	private static function getConect(){ 
		self::getUserd();  
		set_error_handler("setDataDb");
		self::$conn = new mysqli(self::$host,self::$Dname,self::$Dpasswd,self::$database);
		if(self::$conn == false){
			set_error_handler("setDbLogin");
		}
	}
	
	// REQUIRE THE LOGIN
	protected static function getRequiUser(){
		self::getConect();
		try{
			if((self::$conn->query(self::$sql))->num_rows > 0){
				if((self::$conn->query(self::$sql))->num_rows < 2){
					$ar = self::$conn->query(self::$sql);
					$rows = $ar->fetch_assoc();
					$r = "on<". $rows['id'] ."|". $rows['nome']."|". $rows['email']."|". $rows['tipo']."|".$rows['img']."|".$rows['onoff'];
					self::$conn->query("UPDATE users SET onoff='on' WHERE nome='".$rows['nome']."' AND id=".$rows['id']);
					return $r;
				}  else {
					throw new Exception("Data users Duplication.");
				}
			} else {
				throw new Exception(" DM PHP GETREQUIUSER L72.");
			}
		} catch(Exception $e){
			self::$log = $e;
			self::setLog();
		}
		self::$conn->close();
	}
	// LOGOFF THE USER
	public static function getUserOff(){ 
		self::getConect();
		self::$conn->query("UPDATE users SET onoff='off' WHERE nome='".(explode("|",self::$txt))[2]."' AND id=".(explode("|",self::$txt))[1]);
		self::$conn->close();
		return "off";
	}
	// UPDATE USER
	protected static function setDateUs(){
		self::getConect();
//		echo self::$sql;
		try{
			if(self::$conn->query(self::$sql) === true){
//				if(self::$log == "UP_S"){ return "UpDATE"; } else { return "Up"; }
				if(self::$log == "UP_S"){ 
					if(self::$table == "users"){ echo "UpDATEU"; } else { echo "UpDATEP"; }
				} else { echo "Up"; }
			} else {
 				throw new Exception("DM PHP - UPDATE INCORRENT ");
			}
		} catch(Exception $e){
			self::$log = $e->getMessage();
			self::setLog();
		}
		self::$conn->close();
	}
	// REQUIRE THE USER
	protected static function getDataUses(){ 
		self::getConect();
		try{
			if(self::$conn->query(self::$sql)){
				if((self::$conn->query(self::$sql))->num_rows > 0){
						$ar = self::$conn->query(self::$sql);
						$r="";$a=1;
						while($rows = $ar->fetch_assoc()){ 
							if($rows['id'] != ""){
	//						$r .= "!".$rows['id'] . $rows['codigo']. $rows['scu']. $rows['nome'].$rows['tipo'].$rows['quant'].$rows['img'].$rows['statu'];
							$r .= "!<ul id=dataX".$rows['id']." class='li" . $a .
								  "'><li class=l1>"    . $rows['id'] .
								  "</li><li class=l2>" . $rows['nome'].
								  "</li><li class=l3>" . $rows['passwd'].
								  "</li><li class=l4>" . $rows['email'].
								  "</li><li class=l5>" . $rows['tipo'].
								  "</li><li class=l6>" . $rows['priv'].
								  "</li><li class=l7>" . $rows['img'].
								  "</li><li class=l8>" . $rows['statu'].
								  "</li><li class=l9>" . $rows['onoff']. 
								  "</li></ul>";
								if($a == 2){ $a = 1; } else { $a++; }
							}
						}
						return $r;
				}
			} else {
				throw new Exception("DM PHP - REQUIRE DATA INCORRENT ");
			}
		} catch(Exception $e){
			self::$log = $e;
			self::setLog();
		}
		self::$conn->close();
	}
	
	// REQUIRE THE USER
	protected static function getDataPro(){
		self::getConect();
		try{
			if(self::$conn->query(self::$sql)){
				if((self::$conn->query(self::$sql))->num_rows > 0){
						$ar = self::$conn->query(self::$sql);
						$r="";$a=1;
						while($rows = $ar->fetch_assoc()){ 
							if($rows['id'] != ""){
							$r .= "!<ul id=dataX".$rows['id']." class='li" . $a .
								  "'>   <li class=l1>" . $rows['id'] .
								  "</li><li class=l2>" . $rows['codigo'].
								  "</li><li class=l3>" . $rows['tipo'].
								  "</li><li class=l4>" . $rows['nome'].
								  "</li><li class=l5>" . $rows['quant'].
								  "</li><li class=l6>" . $rows['img'].
								  "</li><li class=l7>" . $rows['scu']. 
								  "</li></ul>";
								if($a == 2){ $a = 1; } else { $a++; }
							}
						}
						return $r;
				}
			} else {
				throw new Exception("DM PHP - REQUIRE DATA INCORRENT ");
			}
		} catch(Exception $e){
			self::$log = $e;
			self::setLog();
		}
		self::$conn->close();
	}
	
	// SELECT PRODUTO
	protected static function setTop20Pr(){
		self::getConect(); 
		try{
			$r = []; $i=0;
			$re = self::$conn->query(self::$sql); 
			if($re->num_rows > 0){ 
				while($row = $re->fetch_assoc()){
					$i++;
					$r[$i] .= "<div id='". $row['codigo'] .	"'> <span class='spanText'>Nome: " .
						$row['nome'] . " " . $row['codigo']. "</span> </div>";
				} 
				return $r; 
			} else {
 				throw new Exception("DM PHP - UPDATE INCORRENT ");
			}
		} catch(Exception $e){
			self::$log = $e->getMessage();
			self::setLog();
		}
		self::$conn->close();
	}
}
// SET DATA OF USERS
trait getUser{
	use getVar;
	use getDb;
	// LOGIN
	public static function getUserSel(){
		if(self::setConect() == 1){
			self::$table = "users"; 
			self::getSelectDataUser();
			return self::getRequiUser();
		} else { return 404; }
	}
	
	############### DELETE ###############
	// SQL DELETE
	protected static function setDedateDataUs(){
		self::$log = "UP_S";
		self::$sql = "DELETE FROM users WHERE id='".self::$id."' AND nome='". self::$name ."' AND passwd='". self::$passwd."' AND email='".self::$email."'";
	}
	protected static function setDedateDataPr(){
		self::$log = "UP_S";
		self::$sql = "DELETE FROM produto WHERE id='".self::$id."' AND codigo='". self::$cod ."' AND nome='". self::$name."' AND tipo='".self::$type."'";
	}
	############### INSERT ###############
	// SQL CREATE
	protected static function setCrdateDataUs(){
		self::$log = "UP_S";
		self::$sql = "INSERT INTO users(nome, passwd, email, tipo, priv, img, statu, onoff) 
								   VALUE ('". self::$name ."', '".
											self::$passwd."', '".self::$email."', '".
											self::$type."', '".self::$priv."', '".
											self::$img."', '".self::$statu."', 'off')";
	}
	
	protected static function setCrdateDataPr(){
		self::$log = "UP_S";
		self::$sql = "INSERT INTO produto(codigo, nome, tipo, quant, img, statu, scu) 
								   VALUE ('". self::$cod ."', '".
											self::$name."', '".self::$type."', '".
											self::$quan."', '".self::$img."', '".
											self::$statu."', '".self::$scu."')";
	}
	############### UPDATE ###############
	// SQL UPDATE
	protected static function setUpdateDataUs(){
		self::$log = "UP_S";
		self::$sql = "UPDATE ". self::$table ." SET id=" .self::$id.", nome='" .self::$name."', passwd='". 
		                        self::$passwd."', email='" .self::$email."', tipo='". 
								self::$type."', priv='" .self::$priv."', img='" . 
							    self::$img."', statu='" .self::$statu."' WHERE id=".self::$id;
	}
	
	protected static function setUpdateDataPr(){
		self::$log = "UP_S";
		self::$sql = "UPDATE ". self::$table ." SET id=" .self::$id.", codigo='" .self::$cod."', tipo='". 
		                        self::$type."', nome='" .self::$name."', quant='". 
								self::$quan."', img='" .self::$img."',statu='" .self::$statu."', scu='" . 
							    self::$scu."' WHERE id=".self::$id;
	}
	
	############### SELECT ###############
	// SQL SELECT USERS
	private static function getSelectDataUser(){
		$w = "";
		$se = ""; 
		if(self::$id != ""){ $w = " WHERE "; $se = $se . " id LIKE " . self::$id; 
			if((self::$id != "" and self::$name      != "") or 
			   (self::$id != "" and self::$passwd    != "") or 
			   (self::$id != "" and self::$email     != "") or
			   (self::$id != "" and self::$type      != "") or
			   (self::$id != "" and self::$priv != "") or
			   (self::$id != "" and self::$img       != "") or
			   (self::$id != "" and self::$statu     != "")){  $se = $se . " AND "; }
		}
		if(self::$name != ""){ $w = " WHERE "; $se = $se . " nome LIKE '" . self::$name."'";
			if((self::$name != "" and self::$passwd    != "") or 
			   (self::$name != "" and self::$email     != "") or
			   (self::$name != "" and self::$type      != "") or
			   (self::$name != "" and self::$priv      != "") or
			   (self::$name != "" and self::$img       != "") or
			   (self::$name != "" and self::$statu     != "")){  $se = $se . " AND "; }
		}
		if(self::$passwd != ""){ $w = " WHERE "; $se = $se . " passwd LIKE '" . self::$passwd."'"; 
			if((self::$passwd != "" and self::$email     != "") or
			   (self::$passwd != "" and self::$type      != "") or
			   (self::$passwd != "" and self::$priv      != "") or
			   (self::$passwd != "" and self::$img       != "") or
			   (self::$passwd != "" and self::$statu     != "")){   $se = $se . " AND "; }
		}
		if(self::$email != ""){ $w = " WHERE "; $se = $se . " email LIKE '" . self::$email."'";
			if((self::$email != "" and self::$type      != "") or
			   (self::$email != "" and self::$priv != "") or
			   (self::$email != "" and self::$img       != "") or
			   (self::$email != "" and self::$statu     != "")){  $se = $se . " AND "; }
		}
		if(self::$type != ""){ $w = " WHERE "; $se = $se . " tipo LIKE '" . self::$type."'";
			if((self::$type != "" and self::$priv != "") or
			   (self::$type != "" and self::$img       != "") or
			   (self::$type != "" and self::$statu     != "")){  $se = $se . " AND "; 
			}
		}
		if(self::$priv  != ""){ $w = " WHERE "; $se = $se . " priv LIKE '" . self::$priv."'";
			if((self::$priv != "" and self::$img       != "") or
			   (self::$priv != "" and self::$statu     != "")){ $se = $se . " AND ";
			}
		}	
		if(self::$img != ""){ $w = " WHERE "; $se = $se . " img LIKE '" . self::$img."'";
			if((self::$img != "" and self::$img       != "") or
			   (self::$img != "" and self::$statu     != "")){  $se = $se . " AND ";	
			}
		}
		if(self::$statu != ""){
			$w = " WHERE "; $se = $se . " statu LIKE '" . self::$statu."'";
		}
		self::$sql = "SELECT * FROM ". self::$table . $w . $se;
		
			 
	}
	
	private static function getSelectDataPro(){
		$w = "";
		$se = "";
		if(self::$id != ""){ $w = " WHERE "; $se = $se . " id LIKE " . self::$id; 
			if((self::$id != "" and self::$cod  != "") or 
			   (self::$id != "" and self::$type != "") or 
			   (self::$id != "" and self::$name != "") or
			   (self::$id != "" and self::$quan != "") or
			   (self::$id != "" and self::$img  != "") or
			   (self::$id != "" and self::$scu  != "")){  $se = $se . " AND "; }
		}
		if(self::$cod != ""){ $w = " WHERE "; $se = $se . " codigo LIKE '" . self::$cod."'";
			if((self::$cod != "" and self::$type != "") or 
			   (self::$cod != "" and self::$name != "") or
			   (self::$cod != "" and self::$quan != "") or
			   (self::$cod != "" and self::$img  != "") or
			   (self::$cod != "" and self::$scu  != "")){  $se = $se . " AND "; }
		}
		if(self::$type != ""){ $w = " WHERE "; $se .= " tipo LIKE '" . self::$type."'"; 
			if((self::$type != "" and self::$name != "") or
			   (self::$type != "" and self::$quan != "") or
			   (self::$type != "" and self::$img  != "") or
			   (self::$type != "" and self::$scu  != "")){   $se = $se . " AND "; }
		}
		if(self::$name != ""){ $w = " WHERE "; $se .= " nome LIKE '" . self::$name."'";
			if((self::$name != "" and self::$quan != "") or
			   (self::$name != "" and self::$img  != "") or
			   (self::$name != "" and self::$scu  != "")){  $se = $se . " AND "; }
		}
		if(self::$quan != ""){ $w = " WHERE "; $se = $se . " quant LIKE '" . self::$quan."'";
			if((self::$quan != "" and self::$img != "") or
			   (self::$quan != "" and self::$scu != "")){  $se = $se . " AND "; 
			}
		}
		if(self::$img  != ""){ $w = " WHERE "; $se = $se . " img LIKE '" . self::$img."'";
			if((self::$img != "" and self::$scu != "")){ $se = $se . " AND ";
			}
		}
		if(self::$scu != ""){
			$w = " WHERE "; $se = $se . " scu LIKE '" . self::$scu."'";
		}
		self::$sql = "SELECT * FROM ". self::$table . $w . $se; 
	}
	
	private static function getSelect20Pro(){
		$w = "";
		$se = "";
		if(self::$id != ""){ $w = " WHERE "; $se = $se . " id LIKE " . self::$id; 
			if((self::$id != "" and self::$cod  != "") or 
			   (self::$id != "" and self::$type != "") or 
			   (self::$id != "" and self::$name != "") or
			   (self::$id != "" and self::$quan != "") or
			   (self::$id != "" and self::$img  != "") or
			   (self::$id != "" and self::$scu  != "")){  $se = $se . " AND "; }
		}
		if(self::$cod != ""){ $w = " WHERE "; $se = $se . " codigo LIKE '" . self::$cod."'";
			if((self::$cod != "" and self::$type != "") or 
			   (self::$cod != "" and self::$name != "") or
			   (self::$cod != "" and self::$quan != "") or
			   (self::$cod != "" and self::$img  != "") or
			   (self::$cod != "" and self::$scu  != "")){  $se = $se . " AND "; }
		}
		if(self::$type != ""){ $w = " WHERE "; $se .= " tipo LIKE '" . self::$type."'"; 
			if((self::$type != "" and self::$name != "") or
			   (self::$type != "" and self::$quan != "") or
			   (self::$type != "" and self::$img  != "") or
			   (self::$type != "" and self::$scu  != "")){   $se = $se . " AND "; }
		}
		if(self::$name != ""){ $w = " WHERE "; $se .= " nome LIKE '" . self::$name."'";
			if((self::$name != "" and self::$quan != "") or
			   (self::$name != "" and self::$img  != "") or
			   (self::$name != "" and self::$scu  != "")){  $se = $se . " AND "; }
		}
		if(self::$quan != ""){ $w = " WHERE "; $se = $se . " quant LIKE '" . self::$quan."'";
			if((self::$quan != "" and self::$img != "") or
			   (self::$quan != "" and self::$scu != "")){  $se = $se . " AND "; 
			}
		}
		if(self::$img  != ""){ $w = " WHERE "; $se = $se . " img LIKE '" . self::$img."'";
			if((self::$img != "" and self::$scu != "")){ $se = $se . " AND ";
			}
		}
		if(self::$scu != ""){
			$w = " WHERE "; $se = $se . " scu LIKE '" . self::$scu."'";
		}
		self::$sql = "SELECT * FROM ". self::$table . $w . $se . " LIMIT 21";
	}
	
	// SELECT USER ALL FOR TABLE
	protected static function getUserSelAll(){
		if(self::setConect() == 1){
			if(self::$table == "users"){
//				self::$table = "users";
				self::getSelectDataUser(); // SQL
				return self::getDataUses();
			}
			
			if(self::$table == "produto"){
	//			self::$table = "users";
				self::getSelectDataPro(); // SQL
				return self::getDataPro();
			}
		} else { return 404; }
	}
}

// TEXT FORMS
trait txt{
	use logToo;	
	use getVar;
	use getUser;
	public static function setTxt(){
		try{
			switch((explode("|",self::$ve))[0]){
//				case "me":  self::getMenu(); break;
				case "ps":
				case "pr":
				case "fr":
				case "fs":
				case "frD":
					self::$txt = (explode("|",self::$ve))[1];
					self::getForm();
					break;
 				case "er":
					self::$txt = (explode("|",self::$ve))[1];
					self::getDataError();
					break;

				default: throw new Exception("DM PHP SETTXT");
			}
		} catch(Exception $e){
			self::$log = $e;
			self::setLog();
		}
	}
	public static function getResTxt(){
		return self::$txt;
	}
	private static function getT($x){
		$t = "";
		try{
			switch($x){
				case "C": // RETIRA COMENTARIOS
					$v = true;
					for($i=0;$i<strlen(self::$files);$i++){
						if($v == true){	
							if(!empty(self::$files[$i]) and !empty(self::$files[$i+1]) and !empty(self::$files[$i+2])){
								if((self::$files[$i].self::$files[$i+1].self::$files[$i+2]) == "-->"){
									$v = false;
									$i++;
								}
							}
						}
						if($v == false){
							if(!empty(self::$files[$i-2]) and !empty(self::$files[$i-1]) and !empty(self::$files[$i])){
								for(;;){
									if((self::$files[$i-2].self::$files[$i-1].self::$files[$i]) == "<--"){ $i++; $v = true; break; }
									$i++;
								}
							}
						}
						if(!empty(self::$files[$i])){ $t .= self::$files[$i]; }
					}
					break;

				case "S":
					$t = ""; // SELECT DATA DB
					$v = true;
					for($i=0;$i<strlen(self::$files);$i++){
						if($v == true){
							if(!empty(self::$files[$i]) and !empty(self::$files[$i+1])){
								if(trim(self::$files[$i].self::$files[$i+1]) == "|*"){ $i+=2; $v = false; }
							}
						}
						if($v == false){
							$txt="";
							$id = 1;
							for(;;){
								if(!empty(self::$files[$i-1]) and !empty(self::$files[$i])){
										if(trim(self::$files[$i] != "" and self::$files[$i] != "*" and self::$files[$i]) != "|"){
											$txt .= self::$files[$i];
										}  
									if((self::$files[$i+1].self::$files[$i+2]) == "*|"){  
										// SELECT TEXT IN COMMENTD
										self::$table = trim($txt);
										// GET DATA
										$ve = self::getUserSelAll();
										$r = explode("!",$ve); 
										$f=""; 
//										echo '>>>' . !empty($ve) . '<<< ';
										if(empty($ve)){ 
											$f .= "<div id='retur-statu' class='fal'>Nenhun dado encotrado.</div>"; 
										} else { 
											for($x=1; $x < count($r); $x++){
												$f .= "<li id='li".$id."' onclick='setList(this.id)'> ". $r[$x] ." </li>";
												$id++;
											}
										}
										$t .= $f;
										$v = true;
										$i++;
										break;
									}
									$i++;
								}
							}
						}
						if(!empty(self::$files[$i])){ $t .= self::$files[$i]; }
					}
					break;
				default: throw new Exception("DM PHP GETT L491."); break;	
			} 
		}
		catch(Exception $e){ 
			self::log($e);
		}
		self::$files = $t;
	}
	private static function getDataError(){ 
		if(file_exists("files/form.data")){
			$file = file("files/form.data");
			$line = "";
			for($i=0;$i<count($file);$i++){
				$line .= " ".trim($file[$i]);
			}
			for($i=0;$i<count(explode("$",$line));$i++){
				if(self::$txt == (explode("|",(explode("$",$line))[$i]))[0]){
					self::$files = explode("$",$line)[$i]; 
				}
			}
			self::$txt = self::$files;
		} else {
			self::log("DM PHP GETMENU L502","L502");
		}
	}
	private static function getForm(){
		if(file_exists("files/form.data")){
			$file = file("files/form.data");
			$line = "";
			for($i=0;$i<count($file);$i++){
				$line .= " ".trim($file[$i]);
			}
			for($i=0;$i<count(explode("$",$line));$i++){
				if(self::$txt == (explode("|",(explode("$",$line))[$i]))[0]){
					self::$files = explode("$",$line)[$i]; 
				}
			} 				
			self::getT("C");
			self::getT("S");
			self::$txt = self::$files;
		} else {
			self::log("DM PHP GETMENU L502","L502");
		}
	}
	private static function getMenu(){
		if(file_exists("files/men.data")){
			$file = file("files/men.data");
			$line = "";
			for($i=0;$i<count($file);$i++){
				$line .= " ".trim($file[$i]);
			}
			for($i=0;$i<count(explode("$",$line));$i++){
				if(self::$txt == (explode("|",(explode("$",$line))[$i]))[0]){
					self::$files = explode("$",$line)[$i]; 
				}
			}
			txt::getT("C");
			txt::getT("S");
			self::$txt = self::$files;
		
		} else {
			self::log("DM PHP GETMENU L525","L525");
		}
	}
	protected static function setDataInUs(){
		$c = "abcdefghijklmnopqrstuvywxzABCDEFGHIJKLMNOPQRSTUVYWXZ0123456789";
		$txt = self::$txtDataUs;
		$jj="";
		for($i=0;;$i++){
			if(!isset(self::$txtDataUs[$i])){ break; }
			if(self::$txtDataUs[$i] == "}" or 
			   self::$txtDataUs[$i] == "{" or 
			   self::$txtDataUs[$i] == ":" or 
			   self::$txtDataUs[$i] == "," or 
			   self::$txtDataUs[$i] == "\"" or 
			   self::$txtDataUs[$i] == "|" or 
			   self::$txtDataUs[$i] == "@"){
				
			} else {
				$jj .= self::$txtDataUs[$i];
			}
		}
 
		$b = false;
		for($y=0;;$y++){
			if(!isset($jj[$y])){  $b = true; break; }
			for($x=0;;$x++){	
				if(!isset($c[$x])){ break; }
				if($jj[$y] == $c[$x]){ $jj[$y] = " ";  }
			}
		}
 
		if($b){  
			$n = intval(ord(trim($jj))); 
			
			if($n < 1 or $n > 47 and $n < 58 or $n > 64 and $n < 91 or $n > 96 and $n < 123) {
//			if($n > 47 and $n < 58 or $n > 64 and $n < 91 or $n > 96 and $n < 123) {
				$ar = explode(",",((explode("}",(explode("{",$txt))[1]))[0]));
				$w = [];
				
				$k = (explode("|",self::$txtDataUs))[0];
				if($k == "ps" or $k == "pu" or $k == "pc" or $k == "pd"){
					for($i=1;$i<(count($ar));$i++){ 
						$e = explode(":",$ar[$i]);
						if($e[1] != ""){ $w[$e[0]] = $e[1]; } else { $w[$e[0]] = ""; }
					}
					 
					if($w['id']   != "v" or $w['id']   != ""){ self::$id   = trim($w['id']);   } else { self::$id   = ""; }
					if($w['cod']  != "v" or $w['cod']  != ""){ self::$cod  = trim($w['cod']);  } else { self::$cod  = ""; }
					if($w['tipo'] != "v" or $w['tipo'] != ""){ self::$type = trim($w['tipo']); } else { self::$type = ""; }
					if($w['nome'] != "v" or $w['nome'] != ""){ self::$name = trim($w['nome']); } else { self::$name = ""; }
					if($w['quan']!= "v" or $w['quan'] != ""){ self::$quan = trim($w['quan']); } else { self::$quan = ""; }
					if($w['img']  != "v" or $w['img']  != ""){ self::$img  = trim($w['img']);  } else { self::$img  = ""; }
					if($w['scu']  != "v" or $w['scu']  != ""){ self::$scu  = trim($w['scu']);  } else { self::$scu  = ""; }
				} else {
					for($i=1;$i<(count($ar));$i++){ 
						$e = explode(":",$ar[$i]);
						if($e[1] != ""){ $w[$e[0]] = $e[1]; } else { $w[$e[0]] = ""; }
					}
					if($w['id']    != "v" or $w['id']    != ""){ self::$id     = trim($w['id']);    } else { self::$id     = ""; }
					if($w['nome']  != "v" or $w['nome']  != ""){ self::$name   = trim($w['nome']);  } else { self::$name   = ""; }
					if($w['email'] != "v" or $w['email'] != ""){ self::$email  = trim($w['email']); } else { self::$email  = ""; }
					if($w['pwd']   != "v" or $w['pwd']   != ""){ self::$passwd = trim($w['pwd']);   } else { self::$passwd = ""; }
					if($w['tipo']  != "v" or $w['tipo']  != ""){ self::$type   = trim($w['tipo']);  } else { self::$type   = ""; }
					if($w['priv']  != "v" or $w['priv']  != ""){ self::$priv   = trim($w['priv']);  } else { self::$priv   = ""; }
					if($w['img']   != "v" or $w['img']   != ""){ self::$img    = trim($w['img']);   } else { self::$img    = ""; }
					if($w['statu'] != "v" or $w['statu'] != ""){ self::$statu  = trim($w['statu']); } else { self::$statu  = ""; }
				}
				 
						 
				self::setTxt();
				self::$tf = true;				
			} else {
				self::$ve = "er|erro";
				self::$tf = false;
				self::setTxt();
			}
		} else {   
			self::$txt = "Dado incoreto";
		}
	}
}
 
// CONECT 
class dbC{
	use getUser;
	use getVar;
	use getDb;
	use logToo;
	use txt;
	// GET PRODUTO
	public static function setD(){
		self::$table = "produto";
		self::getSelect20Pro();		
		return self::setTop20Pr();
	}
	// PRODUTO
	public static function setDataPr($x){ 
		try{
			switch((explode("|",$x))[0]){
				// SELECT FORM
				case "pr":
					self::$ve = $x;
					self::setTxt();
					return self::getResTxt(); 
					break;
				// SELECT DATA
				case "ps":
 
					self::$txtDataUs = $x;
					self::setDataInUs();
					self::$ve = $x;
					self::setTxt();
					return self::getResTxt(); 
					break;
				// UPDATE DATA / CREATE DATA / DELET DATA
				case "pu":
				case "pc":
				case "pd":
					self::$txtDataUs = $x;
//					self::$ve = $x; 
					self::setDataInUs();
					if(!self::$tf){
						return self::getResTxt();
					} else {
						self::$table = "produto";
						switch((explode("|",$x))[0]){
							case "pu":
								self::setUpdateDataPr();
								break;

							case "pc":
								self::setCrdateDataPr();
								break;
							
							case "pd":
								self::setDedateDataPr();
								break;

							default: break;
						}
						return self::setDateUs();
					}
					break;
					
				default: throw new Exception("DM PHP DBC."); break;
			}
		}
		catch(Exception $e){
			self::$log = $e;
			self::setLog();
		}
	}
	
	// USERS 
	public static function setDataUs($x){  
 
		try{
			switch((explode("|",$x))[0]){
				case "logi":
					self::$name   = (explode("|",$x))[1];
					self::$passwd = (explode("|",$x))[2];
					return self::getUserSel();
					break;
					
				case "loginOff": 
					self::$txt = $x;
					return self::getUserOff();
					break;
					
				// SELECT FORM
				case "fr": 
					self::getSelectDataUser();
					self::$ve = $x;
					self::setTxt();
					return self::getResTxt(); 
					break;
				
				// SELECT DATA
				case "fs":  
					self::$txtDataUs = $x;
					self::$ve = $x;
					self::setDataInUs();
					return self::getResTxt(); 
					break;
				
				// UPDATE DATA / CREATE DATA / DELET DATA
				case "fu":
				case "fc":
				case "fd": 
					self::$txtDataUs = $x;
					self::$ve = $x;
					self::setDataInUs();
					if(!self::$tf){
						return self::getResTxt();
					} else {
						self::$table = "users";
						switch((explode("|",$x))[0]){
							case "fu": 
								self::setUpdateDataUs();
								break;

							case "fc":
								self::setCrdateDataUs();
								break;
							
							case "fd":
								self::setDedateDataUs(); //echo self::$sql;
								break;

							default: break;
						}
						
						
						return self::setDateUs();
					}
					break; 
				case "frD":
					self::$name  = (explode("|",$x))[2]; 
					self::$email = (explode("|",$x))[3];
					self::getSelectDataUser();
					self::$ve = $x;
					self::setTxt();
					return self::getResTxt(); 
					break; 
				default: throw new Exception("DM PHP DBC."); break;
			}
		}
		catch(Exception $e){
			self::$log = $e;
			self::setLog();
		}
	}
}

function setDataDb($a,$b,$c,$d){
	error_log("[". date("Y/m/d") . "|" . date("H:i:s") ."]|$a|$b|$c|$d \n",3,"log/dataLog_connect.log");
}

?>