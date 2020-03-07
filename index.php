<?php
$page = "body"; 


// SESSION REVIEW USERS
session_start();
if(!empty($_SESSION['on']) != ""){ 
	$page = "adpage";
} else {
	$page = "body";
}



if($page == "body"){
	?><script src="js/ind.js"></script><?php
	require_once("head.php");
	require_once("body.php");	
}

if($page == "adpage"){
	require_once("headDm.php"); 
	require_once("phpbi/menuBar.php"); 
	//require_once("phpbi/adpage.php");	
}

require_once("footer.php");
?>


<?php
/*/
// CONFIGURAÇÕES
$validadeEmSegundos = 60;
$arquivoCache       = "cache/index.php";
$urlDinamica        = "http://landpageweb/LandPage/";

// VERIFICA SE O ARQUIVO CACHE EXISTE E SE AINDA É VALIDO
if(file_exists($arquivoCache) && (filemtime($arquivoCache) > time() - $validadeEmSegundos)){
	// LE O ARQUIVO CACHEADO
	$conteudo = file_get_contents($arquivoCache);
} else {
	// ACESSA A VERSÃO DINAMICA
	$conteudo = file_get_contents($urlDinamica);
	
	// CRIA O CACHE
	file_put_contents($arquivoCache, $conteudo);
}
// EXIBE O CONTEUDO DA PAGINA
echo $conteudo;
/**/
?>