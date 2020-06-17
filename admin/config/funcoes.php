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

		$query = mysqli_query($con,"INSERT INTO pagina_sobre(sobre_descricao,
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

                 

                 
                 $res = mysqli_query($con,"select max(sobre_id)as maior FROM pagina_sobre")or die(mysqli_error($con));
                 $most = mysqli_fetch_assoc($res);
                 $maxId = $most['maior'];
                 mysqli_query($con,"INSERT into pagina_sobre_img(sobreImg_nome,
                 									  sobreImg_tipo,
                                                      paginaSobre_sobre_id)
                 									  VALUES('$file_name',
                 											  '$file_type',
                                                              '$maxId')")or die(mysqli_error($con));


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
			$get = mysqli_query($con,"select * from pagina_sobre_img where paginaSobre_sobre_id = '$id' ")or die(mysqli_error($con));
			while($show = mysqli_fetch_assoc($get)):
				$idImg = $show['sobreImg_id'];
				$titulo = $show['sobreImg_nome'];
				$del = mysqli_query($con,"delete from pagina_sobre_img where sobreImg_id = $idImg")or die(mysqli_error($con));
					unlink('uploads/'.$titulo);
			endwhile;

			
			$res = mysqli_query($con,"Delete from pagina_sobre WHERE sobre_id = '$id' ")or die(mysqli_error($con));
					if($res){
						
						echo header("location:../pages/sobre.php?error=4");
					}else echo header("location:../pages/sobre.php?error=2");
			break;
		case 12://Editar sobre
			$id = $_GET['id'];
			$descricao = htmlspecialchars(trim($_POST['desc']));
			$missao = htmlspecialchars(trim($_POST['missao']));
			$visao = htmlspecialchars(trim($_POST['visao']));
			$valores = htmlspecialchars(trim($_POST['valores']));

			$query = mysqli_query($con,"UPDATE pagina_sobre SET  sobre_descricao = '$descricao',
																sobre_missao = '$missao',
																sobre_visao = '$visao',
																sobre_valores = '$valores'
																WHERE sobre_id = '$id' ")or die(mysqli_error($con));
			if(isset($_FILES['files'])){
	        $errors= array();
	        $id = $_GET['id'];
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

	                 

	                 
	                 //$res = mysqli_query($con,"select max(sobre_id)as maior FROM paginasobre")or die(mysqli_error($con));
	                // $most = mysqli_fetch_assoc($res);
	                 //$maxId = $most['maior'];
	                 mysqli_query($con,"UPDATE pagina_sobre_img SET sobreImg_nome ='$file_name',
	                 									  		   sobreImg_tipo = '$file_type',
	                                                      		   paginaSobre_sobre_id = '$id'
	                 											   WHERE paginaSobre_sobre_id = '$id' ")or die(mysqli_error($con));


	                // mysql_query("INSERT INTO fotos(titulo,FILE_NAME,FILE_SIZE,FILE_TYPE,descricao,data) 
	                  //                  VALUES('$titulo','$file_name','$file_size','$file_type','$descricao','$data')")or die(mysql_error());			

	            }else{
	                    print_r($errors);
	            }
	            
	        }
	    	if(empty($error)){
	    		echo "Success";
	           
	            header("Location:../pages/sobre.php?error=3");
	    	}else{
	    		header("Location:../pages/sobre.php?error=2");
	    	}
	    }

			break;
		case 13://adicionar treinamento
			   $titulo = htmlspecialchars(trim($_POST['titulo']));
			   $objetivo = htmlspecialchars(trim($_POST['objetivo']));
			   $requisito = htmlspecialchars(trim($_POST['requisito']));
			   $conteudo = htmlspecialchars(trim($_POST['conteudo']));
			   $ch = htmlspecialchars(trim($_POST['ch']));
			   $valor	= htmlspecialchars(trim($_POST['valor']));
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
			   $qr = mysqli_query($con,"INSERT INTO pagina_treinamento (treina_titulo,treina_objetivo,treina_requisito,treina_conteudo, treina_ch,treina_valor,treina_imagem,treina_date) VALUES ('$titulo','$objetivo','$requisito','$conteudo','$ch','$valor','$result','$date')")or die(mysqli_error($con));

				if ($qr) {
				header("Location:../pages/treinamentos.php?error=1");
				}else{
					header("Location:../pages/treinamentos.php?error=2");
				}
			break;
		case 14://Editar treinamento
		   $id = $_GET['id'];
		   $titulo = htmlspecialchars(trim($_POST['titulo']));
		   $objetivo = htmlspecialchars(trim($_POST['objetivo']));
		   $requisito = htmlspecialchars(trim($_POST['requisito']));
		   $conteudo = htmlspecialchars(trim($_POST['conteudo']));
		   $ch = htmlspecialchars(trim($_POST['ch']));
		   $valor	= htmlspecialchars(trim($_POST['valor']));
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
		   $qr = mysqli_query($con,"UPDATE pagina_treinamento SET treina_titulo = '$titulo',
													treina_objetivo = '$objetivo',
													treina_requisito = '$requisito',
													treina_conteudo = '$conteudo',
													treina_ch = '$ch',
													treina_valor = '$valor',
													treina_imagem = '$result',
													treina_date = '$date' 
													WHERE treina_id = '$id' ")or die(mysqli_error($con));
			if ($qr) {
				header("Location:../pages/treinamentos.php?error=3");
			}else{
				header("Location:../pages/treinamentos.php?error=2");
			}
			break;
		case 15://excluir treinamento
			$id = $_GET['id'];
			$get = mysqli_query($con,"select * from pagina_treinamento where treina_id = '$id' ")or die(mysqli_error($con));
			$show = mysqli_fetch_assoc($get);
			$titulo = $show['treina_imagem']; // pega o nome da foto antes de deletar
			
			
			$res = mysqli_query($con,"Delete from pagina_treinamento WHERE treina_id = '$id' ")or die(mysqli_error($con));
					if($res){
						unlink('uploads/'.$titulo); // Deleta na pasta
						echo header("location:../pages/treinamentos.php?error=4");
					}else echo header("location:../pages/treinamentos.php?error=2");
			break;
		case 16://adicionar Consultorias
			   $titulo = htmlspecialchars(trim($_POST['titulo']));
			   $desc = htmlspecialchars(trim($_POST['descricao']));
			   $valor	= htmlspecialchars(trim($_POST['valor']));
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
			   $qr = mysqli_query($con,"INSERT INTO pagina_consultoria (consulto_titulo,consulto_descricao,consulto_valor,consulto_imagem,consulto_date) VALUES ('$titulo','$desc','$valor','$result','$date')")or die(mysqli_error($con));

				if ($qr) {
				header("Location:../pages/consultorias.php?error=1");
				}else{
					header("Location:../pages/consultorias.php?error=2");
				}	
			break;
		case 17://Editar Consultorias
			   $id = $_GET['id'];
			   $titulo = htmlspecialchars(trim($_POST['titulo']));
			   $desc = htmlspecialchars(trim($_POST['descricao']));
			   $valor	= htmlspecialchars(trim($_POST['valor']));
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
			  $qr = mysqli_query($con,"UPDATE pagina_consultoria SET consulto_titulo = '$titulo',
																	consulto_descricao = '$desc',
																	consulto_valor = '$valor',
																	consulto_imagem = '$result',
																	consulto_date = '$date' 
																	WHERE consulto_id = '$id' ")or die(mysqli_error($con));

				if ($qr) {
				header("Location:../pages/consultorias.php?error=3");
				}else{
					header("Location:../pages/consultorias.php?error=2");
				}	
			break;
		case 18://Excluir Consultorias
			$id = $_GET['id'];
			$get = mysqli_query($con,"select * from pagina_consultoria where consulto_id = '$id' ")or die(mysqli_error($con));
			$show = mysqli_fetch_assoc($get);
			$titulo = $show['consulto_imagem']; // pega o nome da foto antes de deletar
			
			
			$res = mysqli_query($con,"Delete from pagina_consultoria WHERE consulto_id = '$id' ")or die(mysqli_error($con));
					if($res){
						unlink('uploads/'.$titulo); // Deleta na pasta
						echo header("location:../pages/consultorias.php?error=4");
					}else echo header("location:../pages/consultorias.php?error=2");
			break;
		case 19:// Adicionar profissional
		   $nome = htmlspecialchars(trim($_POST['nome']));
		   $email = htmlspecialchars(trim($_POST['email']));
		   $telefone	= htmlspecialchars(trim($_POST['telefone']));
		   $insta	= htmlspecialchars(trim($_POST['insta']));
		   $especialidade	= htmlspecialchars(trim($_POST['espec']));
		   $desc	= htmlspecialchars(trim($_POST['desc']));
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
		   $qr = mysqli_query($con,"INSERT INTO funcionarios (func_nome,func_email,func_telefone,func_instagram,func_especialidade,func_desc,func_imagem,func_date) VALUES ('$nome','$email','$telefone','$insta','$especialidade','$desc','$result','$date')")or die(mysqli_error($con));

			if ($qr) {
			header("Location:../pages/equipe.php?error=1");
			}else{
				header("Location:../pages/equipe.php?error=2");
			}
			break;
		case 20:// Editar Profissional
			$id = $_GET['id'];
			$nome = htmlspecialchars(trim($_POST['nome']));
		   $email = htmlspecialchars(trim($_POST['email']));
		   $telefone	= htmlspecialchars(trim($_POST['telefone']));
		   $insta	= htmlspecialchars(trim($_POST['insta']));
		   $especialidade	= htmlspecialchars(trim($_POST['espec']));
		   $desc	= htmlspecialchars(trim($_POST['desc']));
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
		   $qr = mysqli_query($con,"UPDATE funcionarios SET func_nome = '$nome',
		   													func_email = '$email',
		   													func_telefone = '$telefone',
		   													func_instagram = '$insta',
		   													func_especialidade = '$especialidade',
		   													func_desc = '$desc',
		   													func_imagem = '$result',
		   													func_date = '$date'
		   													WHERE func_id = '$id' ")or die(mysqli_error($con));

			if ($qr) {
			header("Location:../pages/equipe.php?error=3");
			}else{
				header("Location:../pages/equipe.php?error=2");
			}
			break;
		case 21://Excluir Profissional
			$id = $_GET['id'];
			$get = mysqli_query($con,"select * from funcionarios where func_id = '$id' ")or die(mysqli_error($con));
			$show = mysqli_fetch_assoc($get);
			$titulo = $show['func_imagem']; // pega o nome da foto antes de deletar
			
			
			$res = mysqli_query($con,"Delete from funcionarios WHERE func_id = '$id' ")or die(mysqli_error($con));
					if($res){
						unlink('uploads/'.$titulo); // Deleta na pasta
						echo header("location:../pages/equipe.php?error=4");
					}else echo header("location:../pages/equipe.php?error=2");
			break;
		case 22://Adicionar Contato
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $rua = $_POST['rua'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $longitude = $_POST['long'];
            $latitude = $_POST['lat'];

            $qr = mysqli_query($con,"INSERT INTO pagina_contato (contato_email,contato_telefone,contato_rua,contato_cidade,contato_estado,contato_long,contato_lat) VALUES ('$email','$telefone','$rua','cidade','$estado','$longitude','$latitude')")or die(mysqli_error($con));

			if ($qr) {
			header("Location:../pages/contato.php?error=1");
			}else{
				header("Location:../pages/contato.php?error=2");
			}
			break;
		case 23://Editar Contato
			$id = $_GET['id'];
			$email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $rua = $_POST['rua'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $longitude = $_POST['long'];
            $latitude = $_POST['lat'];

            $qr = mysqli_query($con,"UPDATE pagina_contato SET  contato_email = '$email',
												            	contato_telefone = '$telefone',
												            	contato_rua = '$rua',
												            	contato_cidade = '$cidade',
												            	contato_estado = '$estado',
												            	contato_long = '$longitude',
												            	contato_lat = '$latitude'
												            	WHERE contato_id = '$id'")or die(mysqli_error($con));

			if ($qr) {
			header("Location:../pages/contato.php?error=3");
			}else{
				header("Location:../pages/contato.php?error=2");
			}


			break;
		case 24://Excluir contato

			$id = $_GET['id'];			
			$res = mysqli_query($con,"Delete from pagina_contato WHERE contato_id = '$id' ")or die(mysqli_error($con));
					if($res){
						//unlink('uploads/'.$titulo); // Deleta na pasta
						echo header("location:../pages/contato.php?error=4");
					}else echo header("location:../pages/contato.php?error=2");

			break;
		case 25://Adicionar Usuario
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$senha = md5($senha);
			$date =  date("Y-m-d");
			$qr = mysqli_query($con,"INSERT INTO usuario(usuario_nome,usuario_email,usuario_senha,usuario_date)VALUES('$nome','$email','$senha','$date')")or die(mysqli_error($con));

			if ($qr) {
			header("Location:../pages/usuarios.php?error=1");
			}else{
				header("Location:../pages/usuarios.php?error=2");
			}
			break;
		case 26://Editar usuario
			$id = $_GET['id'];
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$senha = md5($senha);
			$date =  date("Y-m-d");
			$qr = mysqli_query($con,"UPDATE usuario SET usuario_nome ='$nome',
														usuario_email = '$email',
														usuario_senha = '$senha',
														usuario_date = '$date' 
														WHERE usuario_id = '$id'")or die(mysqli_error($con));

			if ($qr) {
			header("Location:../pages/usuarios.php?error=3");
			}else{
				header("Location:../pages/usuarios.php?error=2");
			}
			break;
		case 27://Excluir usuário
			$id = $_GET['id'];			
			$res = mysqli_query($con,"Delete from usuario WHERE usuario_id = '$id' ")or die(mysqli_error($con));
					if($res){
						//unlink('uploads/'.$titulo); // Deleta na pasta
						echo header("location:../pages/usuarios.php?error=4");
					}else echo header("location:../pages/usuarios.php?error=2");
			break;
		default:
			# code...
			break;
	}

?>