<div id="logs">
	<?php require_once("log/errorLog.php"); ?>
	<span id="log01">
		<?php 
			$n = new logError("txt");
			echo $n->getResp();
			?>
	</span>	
	<span id="nu" style="color:red;">
		
		<?php if($n->getNumber() == "File not found"){ ?>
			&#91;
			<?=$n->getNumber(); ?>
			&#93;
		<?php } else { ?>
			<?=$n->getNumber(); ?>
		<?php } ?>
	</span>
</div>