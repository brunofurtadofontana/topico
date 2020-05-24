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
              Página Sobre
              <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">Today is Tuesday, 8 February 2018</small></div>
            </h4>
            <hr>
             <form>
                <div class="form-group">
                  <label for="formGroupExampleInput">Descrição</label>
                  <textarea type="text" class="form-control" name="titulo" id="formGroupExampleInput" placeholder="Descrição"></textarea>
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
                  <input type="file" class="custom-file-input" name="file[]" id="customFile" multiple>
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
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>mark@gmail.com</td>
                      <td>(49)92831-1234</td>
                      <td>Palmitos</td>
                      <td>Chapecó</td>
                      <td>
                        <i class="sidenav-icon ion ion-md-eye"></i>
                        <i class="sidenav-icon ion ion-md-create"></i>
                        <i class="sidenav-icon ion ion-md-trash"></i>
                      </td>
                    </tr>
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