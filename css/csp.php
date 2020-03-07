<?php
class css{
	private $width;
	private $heigth;

	public function getData($x){
		$ar = explode("|", $x);
		echo $ar[0];
		$this->width = $ar[1];
		$this->heigth = $ar[2];
		return $this->setScreen();
	}

	private function setScreen(){

		// 0 359
		if((explode(":",$this->width))[1] < 360){
			echo "0x359|mobile.css";
		}
		// 360  399
		if((explode(":",$this->width))[1] > 360 AND (explode(":",$this->width))[1] < 401){
			echo "360x399|mobile.css";
		}
		// 400 479
		if((explode(":",$this->width))[1] > 400 AND (explode(":",$this->width))[1] < 481){
			echo "400x479|mobile.css";
		}

		// 480 599
		if((explode(":",$this->width))[1] > 480 AND (explode(":",$this->width))[1] < 601){
			echo "480x599|mobile.css";
		}

		// 600 719
		if((explode(":",$this->width))[1] > 600 AND (explode(":",$this->width))[1] < 721){
			echo "600x719|mobile.css";
		}
		// 720 839
		if((explode(":",$this->width))[1] > 720 AND (explode(":",$this->width))[1] < 841){
			echo "720x839|tablet.css";
		}

		// 840 959
		if((explode(":",$this->width))[1] > 840 AND (explode(":",$this->width))[1] < 961){
			echo "840x959|tablet.css";
		}

		// 960 1023
		if((explode(":",$this->width))[1] > 960 AND (explode(":",$this->width))[1] < 1025){
			echo "960x1023|tablet.css";
		}

		// 1024 1279
		if((explode(":",$this->width))[1] > 1024 AND (explode(":",$this->width))[1] < 1281){
			echo "1024x1279|desktop.css";
		}

		// 1280 1439
		if((explode(":",$this->width))[1] > 1280 AND (explode(":",$this->width))[1] < 1441){
			echo "1280x1439|desktop.css";
		}

		// 1440 1599
		if((explode(":",$this->width))[1] > 1440 AND (explode(":",$this->width))[1] < 1601){
			echo "1440x1599|desktop.css";
		}

		// 1600 1919
		if((explode(":",$this->width))[1] > 1600 AND (explode(":",$this->width))[1] < 1921){
			echo "1600x1919|desktop.css";
		}

		// 1920
		if((explode(":",$this->width))[1] > 1920){
			echo "1920x0|desktop.css";
		}




















	}



	private function setCssMobile(){

	}
	private function setCssTable(){

	}
	private function setCssDesktop(){

	}
}

if(!empty($_POST['setPage'])){
	$c = new css();
	$c->getData($_POST['setPage']);
} else {
	echo $_POST['setPage'] . "NOT";
}

?>
