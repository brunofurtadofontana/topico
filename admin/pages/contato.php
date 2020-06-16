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
              Página Contato
              <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">Today is Tuesday, 8 February 2018</small></div>
            </h4>
            <hr>
            <form action="" method="post">
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
                <tr>
                  <th scope="row">1</th>
                  <td>mark@gmail.com</td>
                  <td>(49)92831-1234</td>
                  <td>Palmitos</td>
                  <td>Chapecó</td>
                  <td>Santa Catarina</td>
                  <td>3123123123</td>
                  <td>-21313123</td>
                  <td>
                    <i class="sidenav-icon ion ion-md-eye"></i>
                    <i class="sidenav-icon ion ion-md-create"></i>
                    <i class="sidenav-icon ion ion-md-trash"></i>
                  </td>
                </tr>
              </tbody>
            </table>
            <h5>Mapa</h5>
            <small>Acesse o <a href="https://www.mapcoordinates.net/pt" target="_blank">link</a> para saber as coordenadas Lat/Long</small>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113682.00245365084!2d-52.71584295093236!3d-27.075551945204325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e4b5c94098efa5%3A0x6b810ae0d4ebfb6a!2zQ2hhcGVjw7MsIFND!5e0!3m2!1spt-BR!2sbr!4v1590360649398!5m2!1spt-BR!2sbr" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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