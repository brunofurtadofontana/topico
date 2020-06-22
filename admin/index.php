<!DOCTYPE html>

<html lang="pt" class="default-style">

<head>
  <title>LOGIN - TOPICO</title>

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
  <!-- Page -->
  <link rel="stylesheet" href="assets/vendor/css/pages/authentication.css">
</head>

<body>
  <div class="page-loader">
    <div class="bg-primary"></div>
  </div>

  <!-- Content -->

  <div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4" style="background-image: url('assets/img/bg/1.jpg');">
    <div class="ui-bg-overlay bg-dark opacity-25"></div>

    <div class="authentication-inner py-5">

      <div class="card" style="background:url('../images/img_bg.png');border:1px solid #fff;color:#fff;">
        <div class="p-4 p-sm-5">
          <!-- Logo -->
          <div class="d-flex justify-content-center align-items-center pb-2 mb-4" >
            
            <img src="../images/tp_sf.png" alt="Topico cursos e treinamentos" title="Logo Tópico" width='200' />
          </div>
          <!-- / Logo -->

          <h5 class="text-center font-weight-normal mb-4" style="color:#fff;">Faça login na sua conta!</h5>

          <!-- Form -->
          <form action="config/login.php" method="post">
            <?php 
          error_reporting(0);
          $erro = $_GET['erro'];
          switch ($erro) {
            case 1:
              echo "<div id='erro' class='alert alert-dark-danger alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      Usuário ou senha inválido!
                    </div>";
              break;
            case 2:
              echo "<div id='erro' class='alert alert-dark-danger alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      Usuário ou senha inválido!
                    </div>";
              break;
            case 3:
              echo "<div id='erro' class='alert alert-dark-danger alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      Você precisa estar logado!
                    </div>";
              break;
            case 4:
              echo "<div id='erro' class='alert alert-dark-warning alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      Você foi desconectado!
                    </div>";
              break;
            case 5:
              echo "<div id='erro' class='alert alert-dark-success alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      Senha alterada com sucesso
                    </div>";
              break;
            case 6:
              echo "<div id='erro' class='alert alert-dark-danger alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      Usuário ou senha inválido!
                    </div>";
              break;
            case 7:
              echo "<div id='erro' class='alert alert-dark-success alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      Cadastro Realizado com Sucesso
                    </div>";
              break;
            case 8:
              echo "<div id='erro' class='alert alert-dark-danger alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      Erro ao cadastrar usuario
                    </div>";
              break;
            case 9:
              echo "<div id='erro' class='alert alert-dark-danger alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      CPF já esta cadastrado no SmartTrilha, Recupere sua senha!
                    </div>";
              break;
            default:
              # code...
              break;
          }
      ?>
            <div class="form-group">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="usuario" placeholder="Digite um email" required>
            </div>
            <div class="form-group">
              <label class="form-label d-flex justify-content-between align-items-end">
                <div>Senha</div>
                <a href="forget.php" class="d-block small">Esqueceu a senha?</a>
              </label>
              <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
            </div>
            <div class="d-flex justify-content-between align-items-center m-0">
              <label class="custom-control custom-checkbox m-0">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-label">Lembrar-me</span>
              </label>
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
          <!-- / Form -->

        </div>
        <div class="card-footer py-3 px-4 px-sm-5">
          <div class="text-center text-muted">
            
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- / Content -->

  <!-- Core scripts -->
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/js/sidenav.js"></script>

  <!-- Libs -->
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <!-- Demo -->
  <script src="assets/js/demo.js"></script>

</body>

</html>