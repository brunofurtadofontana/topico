<!DOCTYPE html>

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

            <h4 class="font-weight-bold py-3 mb-4">
              Gerenciar Equipe de profissionais
              <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">Today is Tuesday, 8 February 2018</small></div>
            </h4>
             <div class="col-12 col-md-3 px-0 pb-2">
                <button type="button" class="btn btn-primary rounded-pill d-block"  data-toggle="modal" data-target="#exampleModal">
                <span class="ion ion-md-add"></span>&nbsp; Add Novo</button>           
            </div>  
             <div class="col-sm-6 col-xl-4">
                <div class="card mb-4">
                  <div class="w-100">
                    <a href="../pages/detalheEvento.php?id=<?php echo $idEven;?>" class="card-img-top d-block ui-rect-60 ui-bg-cover" style="background-image: url('../config/uploads/8.jpg')">
                      <div class="d-flex justify-content-between align-items-end ui-rect-content p-3">
                        <div class="flex-shrink-1">                   
                        </div>
                        <div class="text-big">
                          <div class="badge badge-dark font-weight-bold">MECANICA</div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="card-body">
                    <h5 class="mb-3"><a href="../pages/detalheEvento.php?id" class="text-body">LUCAS SOCCOL</a></h5>
                    <p class="text-muted mb-3">Descrição...</p>
                    
                    <div class="media">
                      <div class="media-body">
                        <a href="" title="Editar">
                              <i class="lnr lnr-pencil"> </i>
                              </a>
                              <a href=""  data-toggle="modal" data-target="#myModalDelete<?php echo $idEven; ?>" title="Excluir">
                                <i class="lnr lnr-trash"> </i>
                              </a>
                              <a href=""  title="Detalhes">
                                <i class="lnr lnr-eye"> </i>
                              </a>
                      </div>
                      <div class="text-muted small">
                        <i class="ion ion-md-time text-primary"></i>
                        <span>10/06/2020</span>
                      </div>
                    </div>
                  </div>
                </div>
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
                            <form>
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Nome</label>
                                  <input type="text" class="form-control" name="nome" id="formGroupExampleInput" placeholder="Nome">
                                </div>
                                
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Especialidade</label>
                                  <input type="text" class="form-control" name="especialidade" id="formGroupExampleInput2" placeholder="Especialidade">
                                </div>
                          
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Descrição</label>
                                  <input type="text" class="form-control" name="desc" id="formGroupExampleInput2" placeholder="Descrição sobre">
                                </div>
                                <label for="formGroupExampleInput2">Imagem</label>
                                <div class="custom-file">
                                  
                                  <input type="file" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Escolha uma imagem</label>
                                </div>
                                 
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button type="button" class="btn btn-primary">Salvar</button>
                        </div>
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