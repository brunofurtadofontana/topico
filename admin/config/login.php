<?php
	require_once("conexao.php");

	$gravalog= htmlspecialchars(trim($_POST["usuario"]));//salva na variavel $gravaLog o login do adm
		$gravaSenha= md5($_POST["senha"]);//salva na variavel $gravaSenhaADM a senha do admim	
		$gravaSenha2=md5($gravaSenha);//criptografa a senha
		if($gravalog && $gravaSenha2 != ""){
			$sql = mysqli_query($con,"SELECT * FROM usuario WHERE usuario_email='$gravalog'")or die(mysqli_error($con));//seleciona o banco dados loginfum nome logADM
			$cont = mysqli_num_rows($sql);//cont recebe a a linha selecionada
				while($linha = mysqli_fetch_array($sql)){
					$id = $linha['usuario_id'];
					//$access = $linha['acesso'];
					$gravaPriv = $linha['usuario_privilegio'];
					$senha_db = $linha["usuario_senha"];	
					//$ativo = $linha["user_ativo"];
					//echo $ativo;
				}
				if($cont==0){//se o login do adm não for o cadastrado
					header("Location:../index.php?erro=2");
				}
				else{	
					if($senha_db != $gravaSenha){//se a senha não for igual a que o admim cadastrou
					header("Location:../index.php?erro=1");
					}
					
						else{	
							session_start();
							$_SESSION["LOGIN_USUARIO"]=$gravalog;
							$_SESSION["SENHA_USUARIO"]=$gravaSenha2;
							$_SESSION["PRIVILEGIO"]=$gravaPriv;

							/*$access++;
							$atualiza = mysql_query("UPDATE  usuarios 
													SET acesso = '$access' 
													WHERE idusuarios = '$id' ")or die(mysql_error());*/
							header("location:../pages/home.php");			
							
						}
							
				}
		}
?>