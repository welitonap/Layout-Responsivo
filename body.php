
<div id="modal" class="one">
	<div id="form" class="one">
		<span>Login</span>
		<div id="fieldset">
			<input type="text" id="nameLogin" value="weliton">
			<input type="text" id="passwdLogin" value="123">
			<button id="enterLogin">Enter</button>
		</div>

	</div>
	<div id="modalImg" class="one">
		<div id="closeModal">	eee</div>
		<div id="loanding">	</div>
		<img id="imgClick" src="img/i_img.svg" />
	</div>
</div>
<div id="menuLand">
	<span id="loginLandPri">login</span>
</div>

<!-- <a href="LandPage/"> -->
	<div id="top">
		<h1 id="screenPage" style="font-size: 2em;">WELITON</h1>
    <?=$page ; ?>
	</div>
<!-- </a> -->

<div id="bot">


	<?php
		require_once("he.php");
		$re =  dataPr::getPro();
		$cou = []; $b=0;
		for($i=0;$i<count($re);$i++){
			$cou[$b] .= $re[$i];
			if($b == 4){ $b = 0; }
			$b++;
		}
		?>

	<div id="colu1" class="colu">
		 <?=$cou[1]; ?>
	</div>
	<div id="colu2" class="colu">
		<?=$cou[2]; ?>
	</div>
	<div id="colu3" class="colu">
		<?=$cou[3]; ?>
	</div>
	<div id="colu4" class="colu">
		<?=$cou[4]; ?>
	</div>



</div>













<script src="js/land.js"></script>
