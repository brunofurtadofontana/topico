<?php 

      include("conexao.php");


            $quebra_linha = '\n';
            $email_sender = "automatico@topicotreinamentos.com.br";
            $nomeRemetente = "TopicoTreinamentos";
            $emailDestinatario = htmlspecialchars(trim($_POST['emailreset']));
            $assunto="Reset password";
            
            $qr = mysqli_query($con,"select usuario_id from usuario where usuario_email = '$emailDestinatario' ")or die(mysqli_error($con));
            $guarda = mysqli_fetch_assoc($qr);

            $id = $guarda['usuario_id'];

            if(!$qr){
                  header("Location:../forget.php?error=1");
            }else{
                  if( PATH_SEPARATOR ==';'){ $quebra_linha="\r\n";
       
                  } elseif (PATH_SEPARATOR==':'){ $quebra_linha="\n";
                   
                  } elseif ( PATH_SEPARATOR!=';' and PATH_SEPARATOR!=':' )  {echo ('Esse script não funcionará corretamente neste servidor, a função PATH_SEPARATOR não retornou o parâmetro esperado.');
                   
                  }
                   
                  //pego os dados enviados pelo formulário 

                  //formato o campo da mensagem 
                  $boundary = date("d-m-Y"); 
                  $mensagemHTML = "Content-Transfer-Encoding: 8bits" . $quebra_linha . ""; 
                  $mensagemHTML .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $quebra_linha . "" . $quebra_linha . "";
                  $mensagemHTML .= "<div style='width:80%;height:auto;font-size:16px;background-color:#fff;border:1px solid #ccc;padding:10px 10px;'>";
                  $mensagemHTML .="<center><img src='http://topicotreinamentos.com.br/images/tp_sf.png' width='100' /></center>" ;
                  $mensagemHTML .="<h2>Atualizar senha</h2>";
                  $mensagemHTML .="<h3><a href='http://topicotreinamentos.com.br/admin/updatePass.php?id=$id'>Clique aqui</a> atualizar sua senha</h3>";
                  $mensagemHTML .="<h3>Equipe de suporte Tópico Treinamentos</h3>";
               


                  $headers = "MIME-Version: 1.1" . $quebra_linha . ""; 
                  $headers .= "From: $email_sender " . $quebra_linha . ""; 
                  $headers .= "Return-Path: $email_sender " . $quebra_linha . ""; 
                  $headers .= "Content-type: text/html; charset=iso-8859-1" . $quebra_linha . ""; 
                  $foi = mail($emailDestinatario, $assunto, $mensagemHTML, $headers, "-r". $email_sender);
                  if(!$foi){
                      echo "Erro no servidor de email";
                  }else{
                        header("Location:../forget.php?error=2");
                  }
            }
        
       
?>