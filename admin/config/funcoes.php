<?php
	require("conexao.php");
	$code = $_GET['code'];
	//$id = $_GET['id'];

			// $evenNome = htmlspecialchars(trim($_POST['nomeEven']));
			// $evenDesc = htmlspecialchars(trim($_POST['descEven']));
			// $evenTipoTrilha = htmlspecialchars(trim($_POST['tipoTrilha']));
			// $evenDataInicial = htmlspecialchars(trim($_POST['dataEvento']));
			// $evenHoraInicio = htmlspecialchars(trim($_POST['horaInicio']));
			// $evenHoraFim = htmlspecialchars(trim($_POST['horaFim']));
			// $evenRua = htmlspecialchars(trim($_POST['rua']));

	switch ($code) {

		case 1: //add conteudo página inicial
			$titulo = htmlspecialchars(trim($_POST['titulo']));
			$descricao = htmlspecialchars(trim($_POST['descricao']));

			$qr = mysqli_query($con,"INSERT INTO pagina_inicial(inicial_titulo,
																inicial_descricao) 
														VALUES ('$titulo',
																'$descricao')")or die(mysqli_error($con));
			if ($qr) {
				header("Location:../pages/inicio.php?error=0");
			}else{
				header("Location:../pages/inicio.php?error=1");
			}
			break;


		case 2: //Remover conteúdo pagina incial
			$id = $_GET['id'];
			$res = mysqli_query($con,"Delete from pagina_inicial WHERE inicial_id = '$id' ")or die(mysqli_error($con));
					if($res){
						echo header("location:../pages/inicio.php?error=4");
					}else echo header("location:../pages/inicio.php?error=2");
			break;


		case 3: //Editar conteudo pagina incial
			$id = $_GET['id'];
			$titulo = htmlspecialchars(trim($_POST['titulo']));
			$descricao = htmlspecialchars(trim($_POST['descricao']));
			$qr = mysqli_query($con,"UPDATE pagina_inicial SET inicial_titulo = '$titulo',
														inicial_descricao = '$descricao' 
														WHERE inicial_id = '$id' ")or die(mysqli_error($con));
			if ($qr) {
				header("Location:../pages/inicio.php?error=3");
			}else{
				header("Location:../pages/inicio.php?error=2");
			}
			break;


		case 4://Adicionar banner IMAGEM
			   $titulo = htmlspecialchars(trim($_POST['titulo']));
			   $descricao = htmlspecialchars(trim($_POST['descricao']));
			   $link = htmlspecialchars(trim($_POST['link']));
			   $date =  date("Y-m-d");
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
			   $qr = mysqli_query($con,"INSERT INTO bannerprincipal (banner_titulo,banner_desc,banner_url,banner_img,banner_date) VALUES ('$titulo','$descricao','$link','$result','$date')")or die(mysqli_error($con));

				if ($qr) {
				header("Location:../pages/inicio.php?errorUp=1");
				}else{
					header("Location:../pages/inicio.php?errorUp=2");
				}
				
			break;
		case 5:
			$id = $_GET['id'];
			$get = mysqli_query($con,"select * from bannerprincipal where banner_id = '$id' ")or die(mysqli_error($con));
			$show = mysqli_fetch_assoc($get);
			$titulo = $show['banner_img'];
			
			
			$res = mysqli_query($con,"Delete from bannerprincipal WHERE banner_id = '$id' ")or die(mysqli_error($con));
					if($res){
						unlink('uploads/'.$titulo);
						echo header("location:../pages/inicio.php?errorUp=4");
					}else echo header("location:../pages/inicio.php?errorUp=2");
			break;
		case 6:
			# code...
			break;
		case 7:
			# code...
			break;
		case 8:
			# code...
			break;
		case 9:
			# code...
			break;
		case 10:
			# code...
			break;
		case 11:
			# code...
			break;
		case 12:
			# code...
			break;
		case 13:
			# code...
			break;
		
		default:
			# code...
			break;
	}

?>