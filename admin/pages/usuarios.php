<!DOCTYPE html>
<?php
  session_start();
  include("../config/verifica.php"); //Verifica a sessão esta ativa
  include("../config/conexao.php"); //Importa conexão com banco de dados
  $name = $_SESSION['LOGIN_USUARIO'];
  $res = mysqli_query($con,"SELECT usuario_id, usuario_email,usuario_nome from usuario WHERE usuario_email = '$name' "); //Consulta se o email da SESSION é o mesmo do usuario que esta logado
  $showID = mysqli_fetch_assoc($res);
  $id = $showID['usuario_id']; //Pega o id do usuario logado
  $nome = $showID['usuario_nome'];
  $email = $showID['usuario_email'];

?>
<html lang="pt" class="default-style">

<head>
  <title>Dashboard 1 - Dashboards - Appwork</title>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

  <!-- Icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css">
  <link rel="stylesheet" href="assets/vendor/fonts/ionicons.css">
  <link rel="stylesheet" href="assets/vendor/fonts/linearicons.css">
  <link rel="stylesheet" href="assets/vendor/fonts/open-iconic.css">
  <link rel="stylesheet" href="assets/vendor/fonts/pe-icon-7-stroke.css">

  <!-- Core stylesheets -->
  <link rel="stylesheet" href="assets/vendor/css/rtl/bootstrap.css" class="theme-settings-bootstrap-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/appwork.css" class="theme-settings-appwork-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/theme-corporate.css" class="theme-settings-theme-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/colors.css" class="theme-settings-colors-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/uikit.css">
  <link rel="stylesheet" href="assets/css/demo.css">

  <!-- Load polyfills -->
  <script src="assets/vendor/js/polyfills.js"></script>
  <script>document['documentMode']===10&&document.write('<script src="https://polyfill.io/v3/polyfill.min.js?features=Intl.~locale.en"><\/script>')</script>

  <script src="assets/vendor/js/material-ripple.js"></script>
  <script src="assets/vendor/js/layout-helpers.js"></script>

  <!-- Theme settings -->
  <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
  <script src="assets/vendor/js/theme-settings.js"></script>
  <script>
    window.themeSettings = new ThemeSettings({
      cssPath: 'assets/vendor/css/rtl/',
      themesPath: 'assets/vendor/css/rtl/'
    });
  </script>

  <!-- Core scripts -->
  <script src="assets/vendor/js/pace.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Libs -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">

</head>

<body>
  <div class="page-loader">
    <div class="bg-primary"></div>
  </div>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-2">
    <div class="layout-inner">

      <?php include("menuside.php"); //barra de menu lateral ?>

      <!-- Layout container -->
      <div class="layout-container">

      <?php include("navbar.php"); // topo do admin ?>  

        <!-- Layout content -->
        <div class="layout-content">

          <!-- Content -->
          <div class="container-fluid flex-grow-1 container-p-y">
              <?php 
              error_reporting(0);
              $erro = $_GET['error'];
              switch ($erro) {
                case 1:
                  echo "<div id='erro' class='alert alert-dark-success alert-dismissible fade show'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                          </button>
                         Cadastrado com sucesso!
                        </div>";
                  break;
                  case 2:
                    echo "<div id='erro' class='alert alert-dark-danger alert-dismissible fade show'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                          </button>
                         Algo errado aconteceu.
                        </div>";
                    break;
                  case 3:
                    echo "<div id='erro' class='alert alert-dark-success alert-dismissible fade show'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                          </button>
                         Conteúdo atualizado com sucesso!
                        </div>";
                    break;
                  case 4:
                    echo "<div id='erro' class='alert alert-dark-success alert-dismissible fade show'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                          </button>
                         Conteúdo Deletado com sucesso!
                        </div>";
                    break;
                  default:
                    # code...
                    break;
                }
            ?>  
            <h4 class="font-weight-bold py-3 mb-4">
              Gerenciar usuários
              <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">Today is Tuesday, 8 February 2018</small></div>
            </h4>
            <div class="col-12 col-md-3 px-0 pb-2">
                <button type="button" class="btn btn-primary rounded-pill d-block"  data-toggle="modal" data-target="#exampleModal">
                <span class="ion ion-md-add"></span>&nbsp; Add Novo</button>           
            </div> 
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Data Cadastro</th>
                  <th scope="col">Senha Criptografada</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $query = mysqli_query($con,"select * from usuario")or die(mysqli_error($con));
                    while ($sw = mysqli_fetch_assoc($query)) {
                        $id = $sw['usuario_id'];
                        $nome = $sw['usuario_nome'];
                        $email = $sw['usuario_email'];
                        $data = $sw['usuario_date'];
                        $senha = $sw['usuario_senha'];
                        $date = date("d-m-Y",strtotime("$data")); 
                         
                    ?>
                <tr>
                  <th scope="row"><?php echo $id ?></th>
                  <td><?php echo $nome ?></td>
                  <td><?php echo $email ?></td>
                  <td><?php echo $date ?></td>
                  <td>
                    <?php 
                    $senha = mb_strimwidth($senha, 0, 15, "...");
                    echo $senha; 
                    ?>
                    

                  </td>
                  <td>
                        <i class="sidenav-icon ion ion-md-eye"></i>
                    <a href=""  data-toggle="modal" data-target="#myModalUpdate<?php echo $id; ?>" title="Editar">
                        <i class="sidenav-icon ion ion-md-create"></i>
                    </a>
                    <a href=""  data-toggle="modal" data-target="#myModalDelete<?php echo $id; ?>" title="Deletar">
                      <i class="sidenav-icon ion ion-md-trash"></i>
                    </a>
                  </td>
                </tr>
                <!-- Modal UPDATE-->
                  <div class="modal fade" id="myModalUpdate<?php if($id==$id)echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Atualizar Registro</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="../config/funcoes.php?code=26&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">       
                            <div class="form-group">
                                  <label for="formGroupExampleInput">Nome</label>
                                  <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>" id="formGroupExampleInput" placeholder="Nome" required="required">
                                </div>
                                
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Email</label>
                                  <input type="email" class="form-control" name="email" value="<?php echo $email ?>" id="formGroupExampleInput2" placeholder="Email" required="required">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Senha</label>
                                  <input type="password" class="form-control" name="senha" id="senha1"  placeholder="Digite uma nova senha" required="required">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Confirmar Senha</label>
                                  <input type="password" class="form-control" name="senha" id="senha2" placeholder="Repita a senha" required="required" onblur="validarSenha('senha','senha1')">
                                  <script type="text/javascript">
                                   var password = document.getElementById("senha1")
                                   var confirm_password = document.getElementById("senha2");

                                    function validatePassword(){
                                      if(password.value != confirm_password.value) {
                                        confirm_password.setCustomValidity("Senhas diferentes!");
                                      } else {
                                        confirm_password.setCustomValidity('');
                                      }
                                    }

                                   password.onchange = validatePassword;
                                   confirm_password.onkeyup = validatePassword;

                                  </script>
                                
                         
                         </div>  
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div><!-- Modal Update-->
                <!-- Modal Delete -->
                    <div class="modal fade" id="myModalDelete<?php if($id==$id)echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Tem certeza que deseja deletar o rigistro id: <b><?php echo $id ?></b> ?
                          </div>
                          <div class="modal-footer">
                            <form action="../config/funcoes.php?code=27&id=<?php echo $id; ?>" method="post">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Deletar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>  <!-- modal Delete -->
              <?php } ?>
              </tbody>
            </table>
            <!-- Modal Add novo-->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Adicionar usuário</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="../config/funcoes.php?code=25" method="post">
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Nome</label>
                                  <input type="text" class="form-control" name="nome" id="formGroupExampleInput" placeholder="Nome" required="required">
                                </div>
                                
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Email</label>
                                  <input type="email" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Email" required="required">
                                </div>
                                <!-- <div class="form-group">
                                  <label for="formGroupExampleInput2">Link</label>
                                  <input type="text" class="form-control" name="link" id="formGroupExampleInput2" placeholder="Link: http://topicotreinamentos.com.br/curso">
                                </div> -->
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Senha</label>
                                  <input type="password" class="form-control" name="senha" id="senha1" placeholder="Senha" required="required">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Confirmar Senha</label>
                                  <input type="password" class="form-control" name="senha" id="senha2" placeholder="Senha" required="required" onblur="validarSenha('senha','senha1')">
                                  <script type="text/javascript">
                                   var password = document.getElementById("senha1")
                                   var confirm_password = document.getElementById("senha2");

                                    function validatePassword(){
                                      if(password.value != confirm_password.value) {
                                        confirm_password.setCustomValidity("Senhas diferentes!");
                                      } else {
                                        confirm_password.setCustomValidity('');
                                      }
                                    }

                                   password.onchange = validatePassword;
                                   confirm_password.onkeyup = validatePassword;

                                  </script>
                                </div>
                             
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                         </form>
                      </div>
                    </div>
                  </div><!-- Modal Add-->

          </div>
          <!-- / Content -->

          <?php include("footer.php"); //rodape ?>

        </div>
        <!-- Layout content -->

      </div>
      <!-- / Layout container -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-sidenav-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core scripts -->
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/js/sidenav.js"></script>

  <!-- Libs -->
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="assets/vendor/libs/chartjs/chartjs.js"></script>

  <!-- Demo -->
  <script src="assets/js/demo.js"></script>
  <script src="assets/js/dashboards_dashboard-1.js"></script>
</body>

</html>