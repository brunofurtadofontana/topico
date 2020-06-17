<!DOCTYPE html>
<?php include("../config/conexao.php");?>
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
              Gerenciar Equipe de profissionais
              <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">Today is Tuesday, 8 February 2018</small></div>
            </h4>
             <div class="col-12 col-md-3 px-0 pb-2">
                <button type="button" class="btn btn-primary rounded-pill d-block"  data-toggle="modal" data-target="#exampleModal">
                <span class="ion ion-md-add"></span>&nbsp; Add Novo</button>           
            </div>  

            <div class="row contacts-col-view">

                <?php
                    $query = mysqli_query($con,"select * from funcionarios")or die(mysqli_error($con));
                    while ($sw = mysqli_fetch_assoc($query)) {
                        $id = $sw['func_id'];
                        $nome =  $sw['func_nome'];
                        $email =  $sw['func_email'];
                        $telefone  =  $sw['func_telefone'];
                        $insta =  $sw['func_instagram'];
                        $especialidade =  $sw['func_especialidade'];
                        $desc  =  $sw['func_desc'];
                        $img = $sw['func_imagem'];
                        $dataPost = $sw['treina_date'];
                        $data = date("d-m-Y",strtotime("$dataPost")); 
                    ?>
             <div class=" col-sm-6 col-xl-4 ">
                <div class="card mb-4" >
                  <div class="card-body">
                    <div class="contacts-dropdown btn-group">
                      <button type="button"  class="btn btn-sm btn-default icon-btn borderless rounded-pill md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                        <i class="ion ion-ios-more"></i>
                      </button>
                      <div class="contacts-dropdown-menu dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#myModalUpdate<?php echo $id; ?>" title="Atualizar">Editar</a>
                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#myModalDelete<?php echo $id; ?>" title="Excluir">Remover</a>
                      </div>
                    </div>

                    <div class="contact-content" style="text-align: center;">
                      <img src="../config/uploads/<?php echo $img ?>" class="contact-content-img rounded-circle" alt="" width="150" height="150">
                      <div class="contact-content-about">
                        <br>
                        <h5 class="contact-content-name mb-1"><a href="javascript:void(0)" class="text-body"><?php echo $nome ?></a></h5>
                        <div class="contact-content-user text-muted small mb-2">@<?php echo $insta; ?></div>
                        <div class="small">
                         <?php echo $especialidade ?> <br>
                         <?php echo $telefone ?>
                        </div>
                        <hr class="border-light">
                        <div>
                          <a href="mailto:<?php echo $email ?>" class="text-secondary" title="<?php echo $email ?>"><span class="ion ion-md-mail"></span></a> &nbsp;&nbsp;
                          <a href="javascript:void(0)" class="text-secondary"><span class="ion ion-ios-chatbubbles"></span></a> &nbsp;&nbsp;
                          <span class="text-lighter">|</span> &nbsp;&nbsp;
                          <a href="javascript:void(0)" class="text-twitter" ><span class="ion ion-logo-twitter"></span></a> &nbsp;&nbsp;
                          <a href="javascript:void(0)" class="text-facebook"><span class="ion ion-logo-facebook"></span></a> &nbsp;&nbsp;
                          <a href="http://instagram.com/<?php echo $insta ?>" class="text-instagram" title="@<?php echo $insta ?>"><span class="ion ion-logo-instagram"></span></a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div> 
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
                            <form action="../config/funcoes.php?code=20&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Nome</label>
                                  <input type="text" class="form-control" name="nome" id="formGroupExampleInput" value="<?php echo $nome ?>" placeholder="Nome" required>
                                </div>
                                
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Especialidade</label>
                                  <input type="text" class="form-control" name="espec" id="formGroupExampleInput2" value="<?php echo $especialidade ?>" placeholder="Especialidade" required>
                                </div>
                          
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Descrição</label>
                                  <input type="text" class="form-control" name="desc" id="formGroupExampleInput2" value="<?php echo $desc ?>" placeholder="Descrição sobre" required>
                                </div>
                                 <div class="form-group">
                                  <label for="formGroupExampleInput2">Telefone</label>
                                  <input type="text" class="form-control" name="telefone" id="formGroupExampleInput2" value="<?php echo $telefone ?>" placeholder="(XX)XXXXX-XXXX" required>
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">@instagram</label>
                                  <input type="text" class="form-control" name="insta" id="formGroupExampleInput2" value="<?php echo $insta ?>" placeholder="@fulano">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Email</label>
                                  <input type="email" class="form-control" name="email" id="formGroupExampleInput2" value="<?php echo $email ?>" placeholder="Email" required>
                                </div>
                                
                                <label for="formGroupExampleInput2">Imagem</label>
                                <div class="custom-file">
                                  
                                  <input type="file" class="custom-file-input" id="customFile" name="imagem" required="">
                                  <label class="custom-file-label" for="customFile">Escolha uma imagem</label>
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
                            <form action="../config/funcoes.php?code=21&id=<?php echo $id; ?>" method="post">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Deletar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>  <!-- modal Delete -->
            <?php } ?>
            </div>
              <!-- Modal Add novo-->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Adicionar profissional</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="../config/funcoes.php?code=19" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Nome</label>
                                  <input type="text" class="form-control" name="nome" id="formGroupExampleInput" placeholder="Nome" required>
                                </div>
                                
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Especialidade</label>
                                  <input type="text" class="form-control" name="espec" id="formGroupExampleInput2" placeholder="Especialidade" required>
                                </div>
                          
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Descrição</label>
                                  <input type="text" class="form-control" name="desc" id="formGroupExampleInput2" placeholder="Descrição sobre" required>
                                </div>
                                 <div class="form-group">
                                  <label for="formGroupExampleInput2">Telefone</label>
                                  <input type="text" class="form-control" name="telefone" id="formGroupExampleInput2" placeholder="(XX)XXXXX-XXXX" required>
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">@instagram</label>
                                  <input type="text" class="form-control" name="insta" id="formGroupExampleInput2" placeholder="@fulano">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Email</label>
                                  <input type="email" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Email" required>
                                </div>

                                <label for="formGroupExampleInput2">Imagem Perfil</label>
                                <div class="custom-file">
                                  
                                  <input type="file" class="custom-file-input" id="customFile" name="imagem" required="">
                                  <label class="custom-file-label" for="customFile">Escolha uma imagem</label>
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