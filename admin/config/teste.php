<?php
/*
 * Para maiores informações da classe resize2.php, visite o site: http://www.jarrodoberto.com/articles/2011/09/image-resizing-made-easy-with-php
 * Este é o site do autor do script resize2.php
 * */

if(isset($_POST['gravar']) && isset($_FILES['imagem'])){
	$pasta = 'uploads';
   $file = $_FILES['imagem'];
   $temp = $file['tmp_name'];
   $filename = $file['name'];
 
   $largura_max	= 1300;
   $altura_max	= 800;
   // arquivo que contém a função
   require ('resize2.php');
   // funcao que redimensionará a imagem
   // o retorno da função é o nome do arquivo 
   $result = upload($temp, $filename, $largura_max, $altura_max, $pasta);
   // gravando nome do arquivo no banco de dados
   //$insert = mysql_query("INSERT INTO nome_tabela (arquivo_imagem) VALUES ('".$result."')");

	
}
?>
<html>
	<head>
		<title>Upload com redimensionamento</title>	
	</head>
	<body>
		<form action="teste.php" method="post" enctype="multipart/form-data">
			<input type="file" name="imagem" id="imagem" />
			<input type="submit" name="gravar" value="Gravar" id="gravar" />
			
		</form>
	</body>
</html>