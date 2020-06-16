<?php include("../config/conexao.php"); ?>
<!DOCTYPE html>

<html lang="pt" class="default-style">

<head>
  <title>Sobre empresa - Tópico treinamentos</title>

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
              Página Sobre
              <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">Today is Tuesday, 8 February 2018</small></div>
            </h4>
            <hr>
             <form action="../config/funcoes.php?code=10" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="formGroupExampleInput">Descrição</label>
                  <textarea type="text" class="form-control" name="desc" id="formGroupExampleInput" placeholder="Descrição"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="formGroupExampleInput2">Missão</label>
                  <textarea type="text" class="form-control" name="missao" id="formGroupExampleInput" placeholder="Missão"></textarea> 
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Visão</label>
                  <textarea type="text" class="form-control" name="visao" id="formGroupExampleInput" placeholder="Visão"></textarea> 
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Valoes</label>
                  <textarea type="text" class="form-control" name="valores" id="formGroupExampleInput" placeholder="Valores"></textarea> 
                </div>
                <label for="formGroupExampleInput2">Imagem</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="files[]" id="customFile" multiple>
                  <label class="custom-file-label" for="customFile">Escolha uma ou mais imagem</label>
                </div>
                <br>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div> 
              </form>
              <hr>
              <h2>Dados cadastrados</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Descrição</th>
                      <th scope="col">Missão</th>
                      <th scope="col">Visão</th>
                      <th scope="col">Valores</th>
                      <th scope="col">Imagens</th>
                      <th scope="col" style="width:10%;">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $qr = mysqli_query($con,"select *from pagina_sobre")or die(mysqli_error($con));
                        while($show=mysqli_fetch_assoc($qr)){
                          $id = $show['sobre_id'];
                          $desc = $show['sobre_descricao'];
                          $missao = $show['sobre_missao'];
                          $visao = $show['sobre_visao'];
                          $valores = $show['sobre_valores'];
                       
                        $totalImagens = mysqli_query($con,"select count(sobreImg_id) as total from  pagina_sobre_img where paginaSobre_sobre_id = $id")or die(mysqli_error($con));
                        $count = mysqli_fetch_assoc($totalImagens);
                        $count = $count['total'];

                    ?>
                    <tr>
                      <th scope="row"><?php echo $id; ?></th>
                      <td><?php echo $desc; ?></td>
                      <td><?php echo $missao; ?></td>
                      <td><?php echo $visao; ?></td>
                      <td><?php echo $valores; ?></td>
                      <td>Imagens(<?php echo $count ?>)</td>
                      <td>
                        <a href="http://topicotreinamentos.com.br" target="_blank" ><i class="sidenav-icon ion ion-md-eye"></i></a>
                        <a href=""  data-toggle="modal" data-target="#myModalUpdate<?php echo $id; ?>"  ><i class="sidenav-icon ion ion-md-create"></i></a>
                        <a href=""  data-toggle="modal" data-target="#myModalDelete<?php echo $id; ?>"  ><i class="sidenav-icon ion ion-md-trash"></i></a>
                      </td>
                    </tr>
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
                            <form action="../config/funcoes.php?code=11&id=<?php echo $id; ?>" method="post">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Deletar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>  <!-- modal Delete -->
                    <!-- Modal UPDATE Banner-->
                    <div class="modal fade" id="myModalUpdate<?php if($id==$id)echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Atualizar Registro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <form action="../config/funcoes.php?code=12&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Descrição</label>
                            <textarea type="text" class="form-control" name="desc" id="formGroupExampleInput" placeholder="Descrição" required><?php echo $desc; ?></textarea>
                          </div>
                          
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Missão</label>
                            <textarea type="text" class="form-control" name="missao" id="formGroupExampleInput" placeholder="Missão" required><?php echo $missao; ?></textarea> 
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Visão</label>
                            <textarea type="text" class="form-control" name="visao" id="formGroupExampleInput" placeholder="Visão" required><?php echo $visao; ?></textarea> 
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Valoes</label>
                            <textarea type="text" class="form-control" name="valores" id="formGroupExampleInput" placeholder="Valores" required><?php echo $valores; ?></textarea> 
                          </div>
                          <label for="formGroupExampleInput2">Imagem</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="files[]" id="customFile" multiple required="required">
                            <label class="custom-file-label" for="customFile">Escolha uma ou mais imagem</label>
                          </div>
                          <br>
                        
                          </div>
                          <div class="modal-footer">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>  <!-- modal UPDATE -->
                  <?php } ?>
                  </tbody>
                </table>
            

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