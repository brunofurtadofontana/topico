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
              Página Contato
              <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">Today is Tuesday, 8 February 2018</small></div>
            </h4>
            <hr>
            <form action="../config/funcoes.php?code=22" method="post">
              <div class="form-row">
              <div class="form-group col-md-12">
                <label for="formGroupExampleInput">Email Contato</label>
                <input type="email" class="form-control" name="email" id="formGroupExampleInput" placeholder="Email">
              </div>
              <div class="form-group col-md-12">
                <label for="formGroupExampleInput2">Telefone Contato</label>
                <input type="text" class="form-control" name="telefone" id="formGroupExampleInput2" placeholder="Telefone">
              </div>
              <div class="form-group col-md-4">
                <label for="formGroupExampleInput2">Rua</label>
                <input type="text" class="form-control" name="rua" id="formGroupExampleInput2" placeholder="Rua.">
              </div>
              <div class="form-group col-md-4">
                <label for="formGroupExampleInput2">Cidade</label>
                <input type="text" class="form-control" name="cidade" id="formGroupExampleInput2" placeholder="Cidade">
              </div>
              <div class="form-group col-md-4">
                <label for="formGroupExampleInput2">Estado</label>
                <input type="text" class="form-control" name="estado" id="formGroupExampleInput2" placeholder="Estado" value="Santa Catarina">
              </div>
              <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Latitude</label>
                <input type="text" class="form-control" name="lat" id="formGroupExampleInput2" placeholder="Latitude">
              </div>
              <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Longitude</label>
                <input type="text" class="form-control" name="long" id="formGroupExampleInput2" placeholder="Longitude">
              </div>
              <button type="submit" class="btn btn-primary">Salvar</button>
             </div>
               
            </form>
            <hr>
            <h2>Dados cadastrados</h2>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Email</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Rua</th>
                  <th scope="col">Cidade</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Latitude</th>
                  <th scope="col">Longitude</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $query = mysqli_query($con,"select * from pagina_contato")or die(mysqli_error($con));
                    while ($sw = mysqli_fetch_assoc($query)) {
                        $id = $sw['contato_id'];
                        $email = $sw['contato_email'];
                        $telefone = $sw['contato_telefone'];
                        $rua = $sw['contato_rua'];
                        $cidade = $sw['contato_cidade'];
                        $estado = $sw['contato_estado'];
                        $Longitude = $sw['contato_long'];
                        $Latitude = $sw['contato_lat'];
                         
                    ?>
                <tr>
                  <th scope="row"><?php echo $id ?></th>
                  <td><?php echo $email ?></td>
                  <td><?php echo $telefone ?></td>
                  <td><?php echo $rua ?></td>
                  <td><?php echo $cidade ?></td>
                  <td><?php echo $estado ?></td>
                  <td><?php echo $Latitude ?></td>
                  <td><?php echo $Longitude ?></td>
                  <td>
                    <i class="sidenav-icon ion ion-md-eye"></i>
                    <a href=""  data-toggle="modal" data-target="#myModalUpdate<?php echo $id; ?>" title="Editar">
                        <i class="ion ion-md-create"> </i>
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
                            <form action="../config/funcoes.php?code=23&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">       
                            <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="formGroupExampleInput">Email Contato</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email ?>" id="formGroupExampleInput" placeholder="Email" required="required">
                          </div>
                          <div class="form-group col-md-12">
                            <label for="formGroupExampleInput2">Telefone Contato</label>
                            <input type="text" class="form-control" name="telefone" value="<?php echo $telefone ?>" id="formGroupExampleInput2" placeholder="(xx)xxxxx-xxxx" required="required">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="formGroupExampleInput2">Rua</label>
                            <input type="text" class="form-control" name="rua" value="<?php echo $rua ?>" id="formGroupExampleInput2" placeholder="Rua.">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="formGroupExampleInput2">Cidade</label>
                            <input type="text" class="form-control" name="cidade"  value="<?php echo $cidade ?>" id="formGroupExampleInput2" placeholder="Cidade" required="required">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="formGroupExampleInput2">Estado</label>
                            <input type="text" class="form-control" name="estado" value="<?php echo $estado ?>" id="formGroupExampleInput2" placeholder="Estado" value="Santa Catarina">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="formGroupExampleInput2">Latitude</label>
                            <input type="text" class="form-control" name="lat" value="<?php echo $Latitude ?>" id="formGroupExampleInput2" placeholder="-32.123213" required="required">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="formGroupExampleInput2">Longitude</label>
                            <input type="text" class="form-control" name="long" value="<?php echo $Longitude ?>" id="formGroupExampleInput2" placeholder="-28.12321132" required="required">
                          </div>
                         
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
                            <form action="../config/funcoes.php?code=24&id=<?php echo $id; ?>" method="post">
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
            <h5>Mapa</h5>
            <small>Acesse o <a href="https://www.mapcoordinates.net/pt" target="_blank">link</a> para saber as coordenadas Lat/Long</small>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113682.00245365084!2d<?php echo $long ?>5093236!3d<?php echo $lat ?>45204325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e4b5c94098efa5%3A0x6b810ae0d4ebfb6a!2zQ2hhcGVjw7MsIFND!5e0!3m2!1spt-BR!2sbr!4v1590360649398!5m2!1spt-BR!2sbr" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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