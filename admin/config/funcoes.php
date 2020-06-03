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
		case 5: //Deletar banner
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
		case 6: //Editar Banner
			   $id = $_GET['id'];
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
			   $qr = mysqli_query($con,"UPDATE bannerprincipal SET banner_titulo = '$titulo',
														banner_desc = '$descricao',
														banner_url = '$link',
														banner_img = '$result',
														banner_date = '$date' 
														WHERE banner_id = '$id' ")or die(mysqli_error($con));
				if ($qr) {
					header("Location:../pages/inicio.php?errorUp=3");
				}else{
					header("Location:../pages/inicio.php?errorUp=2");
				}
			break;
		case 7:// Adicionar Portfólio
			   $titulo = htmlspecialchars(trim($_POST['titulo']));
			   $descricao = htmlspecialchars(trim($_POST['descricao']));
			   $link = htmlspecialchars(trim($_POST['link']));
			   $date =  date("Y-m-d");
			   $pasta = 'uploads';
			   $file = $_FILES['imagem'];
			   $temp = $file['tmp_name'];
			   $filename = $file['name'];
			   $filename = time().$filename;
			 
			   $largura_max	= 1300;
			   $altura_max	= 800;
			   // arquivo que contém a função
			   require ('resize2.php');
			   // funcao que redimensionará a imagem
			   // o retorno da função é o nome do arquivo 
			   $result = upload($temp, $filename, $largura_max, $altura_max, $pasta);
			   // gravando nome do arquivo no banco de dados
			   $qr = mysqli_query($con,"INSERT INTO pagina_portfolio (port_titulo,port_descricao,port_img,port_date) VALUES ('$titulo','$descricao','$result','$date')")or die(mysqli_error($con));

				if ($qr) {
				header("Location:../pages/portifolio.php?error=1");
				}else{
					header("Location:../pages/portifolio.php?error=2");
				}
			break;
		case 8://Remover portfolio
			$id = $_GET['id'];
			$get = mysqli_query($con,"select * from pagina_portfolio where port_id = '$id' ")or die(mysqli_error($con));
			$show = mysqli_fetch_assoc($get);
			$titulo = $show['port_img']; // pega o nome da foto antes de deletar
			
			
			$res = mysqli_query($con,"Delete from pagina_portfolio WHERE port_id = '$id' ")or die(mysqli_error($con));
					if($res){
						unlink('uploads/'.$titulo); // Deleta na pasta
						echo header("location:../pages/portifolio.php?error=4");
					}else echo header("location:../pages/portifolio.php?error=2");
			break;
		case 9: //Editar portfolio
			   $id = $_GET['id'];
			   $titulo = htmlspecialchars(trim($_POST['titulo']));
			   $descricao = htmlspecialchars(trim($_POST['descricao']));
			   //$link = htmlspecialchars(trim($_POST['link']));
			   $date =  date("Y-m-d");
			   $pasta = 'uploads';
			   $file = $_FILES['imagem'];
			   $temp = $file['tmp_name'];
			   $filename = $file['name'];
			   $filename = time().$filename;
			 
			   $largura_max	= 1300;
			   $altura_max	= 800;
			   // arquivo que contém a função
			   require ('resize2.php');
			   // funcao que redimensionará a imagem
			   // o retorno da função é o nome do arquivo 
			   $result = upload($temp, $filename, $largura_max, $altura_max, $pasta);
			   $qr = mysqli_query($con,"UPDATE pagina_portfolio SET port_titulo = '$titulo',
														port_descricao = '$descricao',
														port_img = '$result',
														port_date = '$date' 
														WHERE port_id = '$id' ")or die(mysqli_error($con));
				if ($qr) {
					header("Location:../pages/portifolio.php?error=3");
				}else{
					header("Location:../pages/portifolio.php?error=2");
				}
			break;
		case 10: // Adicionar sobre

		$descricao = htmlspecialchars(trim($_POST['desc']));
		$missao = htmlspecialchars(trim($_POST['missao']));
		$visao = htmlspecialchars(trim($_POST['visao']));
		$valores = htmlspecialchars(trim($_POST['valores']));

		$query = mysqli_query($con,"INSERT INTO paginasobre(sobre_descricao,
															sobre_missao,
															sobre_visao,
															sobre_valores)
															VALUES('$descricao',
																	'$missao',
																	'$visao',
																	'$valores')")or die(mysqli_error($con));

		if(isset($_FILES['files'])){
        $errors= array();
       
    	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
    		$file_name = md5(rand(1,999)).$_FILES['files']['name'][$key];
            $file_size =$_FILES['files']['size'][$key];
            $file_tmp =$_FILES['files']['tmp_name'][$key];
            $file_type=$_FILES['files']['type'][$key];
            if($file_size > 99097152){
    			$errors[]='File size must be less than 3 MB';
                var_dump($errors);
            }		
            $desired_dir="uploads";
            if(empty($errors)==true){
                if(is_dir($desired_dir)==false){
                    mkdir("$desired_dir", 0700);		// Create directory if it does not exist
                }
                if(is_dir("$desired_dir/".$file_name)==false){
                    move_uploaded_file($file_tmp,"uploads/".$file_name);
                }else{									//rename the file if another one exist
                    $new_dir="uploads/".$file_name.time();
                     rename($file_tmp,$new_dir) ;				
                }

                 

                 
                 $res = mysqli_query($con,"select max(sobre_id)as maior FROM paginasobre")or die(mysqli_error($con));
                 $most = mysqli_fetch_assoc($res);
                 $maxId = $most['maior'];
                 mysqli_query($con,"INSERT into paginasobre_img(sobreImg_nome,
                 									  sobreImg_tipo,
                                                      paginaSobre_sobre_id)
                 									  VALUES('$file_name',
                 											  '$file_type',
                                                              '$maxId')")or die(mysql_error());


                // mysql_query("INSERT INTO fotos(titulo,FILE_NAME,FILE_SIZE,FILE_TYPE,descricao,data) 
                  //                  VALUES('$titulo','$file_name','$file_size','$file_type','$descricao','$data')")or die(mysql_error());			

            }else{
                    print_r($errors);
            }
            
        }
    	if(empty($error)){
    		echo "Success";
           
            header("Location:../pages/sobre.php?error=1");
    	}else{
    		header("Location:../pages/sobre.php?error=2");
    	}
    }
			break;
		case 11://Remover sobre
			$id = $_GET['id'];
			$get = mysqli_query($con,"select * from paginasobre_img where paginaSobre_sobre_id = '$id' ")or die(mysqli_error($con));
			while($show = mysqli_fetch_assoc($get)):
			$idImg = $show['sobreImg_id'];
			$titulo = $show['sobreImg_nome'];
			$del = mysqli_query($con,"delete from paginasobre_img where sobreImg_id = $idImg")or die(mysqli_error($con));
				unlink('uploads/'.$titulo);
			endwhile;

			
			$res = mysqli_query($con,"Delete from paginasobre WHERE sobre_id = '$id' ")or die(mysqli_error($con));
					if($res){
						
						echo header("location:../pages/sobre.php?error=4");
					}else echo header("location:../pages/sobre.php?error=2");
			break;
		case 12://Editar sobre
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