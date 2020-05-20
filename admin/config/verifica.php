<?php 
//$compra = $_GET['compra'];
if(!isset($_SESSION["LOGIN_USUARIO"])){
 //os nomes da sessao no caso to mostrando se for login e senha
	// if($compra == 1){
	// 	header("Location:logme.php?error=3&compra=$compra");
	// }
header("Location:../index.php?erro=3");
 //aki o cara vai pra index.php se nao tiver logado  
}
?>