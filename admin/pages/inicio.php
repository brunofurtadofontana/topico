<?php include("../config/conexao.php");?>
<!DOCTYPE html>

<html lang="pt" class="default-style">

<head>
  <title>Tópico Cursos e Treinamentos - Chapecó</title>

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
              $erro = $_GET['errorUp'];
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
              Banner Rotativo
              <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">Today is Tuesday, 8 February 2018</small></div>
            </h4>
            <div class="col-12 col-md-3 px-0 pb-2">
                <button type="button" class="btn btn-primary rounded-pill d-block"  data-toggle="modal" data-target="#exampleModal">
                <span class="ion ion-md-add"></span>&nbsp; Add Banner</button>           
            </div> 
            <div class="row"> 
             <?php 
                    $query = mysqli_query($con,"select * from bannerprincipal")or die(mysqli_error($con));
                    while ($sw = mysqli_fetch_assoc($query)) {
                        $idBanner = $sw['banner_id'];
                        $titulo = $sw['banner_titulo'];
                        $desc = $sw['banner_desc'];
                        $img = $sw['banner_img'];
                        $dataPost = $sw['banner_date'];
                        $data = date("d-m-Y",strtotime("$dataPost")); 
                        $link = $sw['banner_url'];
                    
              ?>
             <div class="col-sm-6 col-xl-4">
                <div class="card mb-2">
                  <div class="w-100">
                    <a href="" class="card-img-top d-block ui-rect-60 ui-bg-cover" style="background-image: url('../config/uploads/<?php echo $img ?>')">
                      <div class="d-flex justify-content-between align-items-end ui-rect-content p-3">
                        <div class="flex-shrink-1">                   
                        </div>
                        <!-- <div class="text-big">
                          <div class="badge badge-dark font-weight-bold">kk</div>
                        </div> -->
                      </div>
                    </a>
                  </div>
                  <div class="card-body">
                    <h5 class="mb-3"><a href="" class="text-body"><?php echo $titulo ?></a></h5>
                    <p class="text-muted mb-3"><?php echo $desc; ?></p>
                    
                    <div class="media">
                      <div class="media-body">
                        <a href="" data-toggle="modal" data-target="#myModalUpdate<?php echo $idBanner; ?>" title="Editar">
                        <i class="lnr lnr-pencil"> </i>
                        </a>
                        <a href=""  data-toggle="modal" data-target="#myModalDelete<?php echo $idBanner; ?>" title="Excluir">
                          <i class="lnr lnr-trash"> </i>
                        </a>
                        
                      </div>
                      <div class="text-muted small">
                        <i class="ion ion-md-time text-primary"></i>
                        <span><?php echo $data; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
              <!-- Modal Delete Banner-->
                    <div class="modal fade" id="myModalDelete<?php if($idBanner==$idBanner)echo $idBanner;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deletar Banner</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Tem certeza que deseja deletar <b><?php echo $titulo ?></b> ?
                          </div>
                          <div class="modal-footer">
                            <form action="../config/funcoes.php?code=5&id=<?php echo $idBanner; ?>" method="post">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Deletar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>  <!-- modal Delete -->
              <!-- Modal Editar Banner-->
                    <div class="modal fade" id="myModalUpdate<?php if($idBanner==$idBanner)echo $idBanner;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Atualizar Banner</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="../config/funcoes.php?code=6&id=<?php echo $idBanner; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Título</label>
                                  <input type="text" class="form-control" name="titulo" value="<?php echo $titulo ?>" id="formGroupExampleInput" placeholder="Título do banner"required>
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Descrição</label>
                                  <input type="text" class="form-control" name="descricao" value="<?php echo $desc ?>" id="formGroupExampleInput2" placeholder="Descrição" required>
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Link</label>
                                  <input type="text" class="form-control" name="link" value="<?php echo $link ?>" id="formGroupExampleInput2" placeholder="Link: http://topicotreinamentos.com.br/curso" required>
                                </div>
                                <label for="formGroupExampleInput2">Imagem</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="customFile" name="imagem" required>
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
                    </div>  <!-- modal Editar -->
                <?php } //FIM DO LAÇO QUE RETORNA DADOS DA TABELA BANNERPRINCIPAL ?>
              <!-- Modal Add novo Banner-->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Adicionar Banner</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="../config/funcoes.php?code=4" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Título</label>
                                  <input type="text" class="form-control" name="titulo" id="formGroupExampleInput" placeholder="Título do banner"required>
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Descrição</label>
                                  <input type="text" class="form-control" name="descricao" id="formGroupExampleInput2" placeholder="Descrição" required>
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Link</label>
                                  <input type="text" class="form-control" name="link" id="formGroupExampleInput2" placeholder="Link: http://topicotreinamentos.com.br/curso" required>
                                </div>
                                <label for="formGroupExampleInput2">Imagem</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="customFile" name="imagem" required>
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
                  </div><!-- Modal Add banner-->
                  </div>
                  <br>
                  <hr>
                <h4>Conteúdo da página inicial</h4>
                <?php 
          error_reporting(0);
          $erro = $_GET['error'];
          switch ($erro) {
            case 1:
              echo "<div id='erro' class='alert alert-dark-success alert-dismissible fade show'>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                      </button>
                     Conteúdo cadastrado com sucesso!
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
                <div class="col-12 col-md-3 px-0 pb-2">
                  <button type="button" class="btn btn-primary rounded-pill d-block"  data-toggle="modal" data-target="#exampleModal1">
                  <span class="ion ion-md-add"></span>&nbsp; Add Novo</button>           
                </div>
                <hr>
                <?php 
                      $query = mysqli_query($con,"select * from pagina_inicial")or die(mysqli_error($con));
                      $show = mysqli_fetch_assoc($query);
                      $total = mysqli_num_rows($query);
                      if($total >0){
                  ?>
                 <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Titulo</th>
                      <th scope="col">Texto</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
              <tbody>
                <tr>
                  <th scope="row"><?php echo $show['inicial_id']; ?></th>
                  <td><?php echo $show['inicial_titulo']; ?></td>
                  <td style="width:40%;"><?php echo $show['inicial_descricao']; ?></td>
                  <td>
                    <a href=""><i class="sidenav-icon ion ion-md-eye"></i></a>
                    <a href="" data-toggle="modal" data-target="#modalUp" ><i class="sidenav-icon ion ion-md-create"></i></a>
                    <a href="" data-toggle="modal" data-target="#modalDelete" ><i class="sidenav-icon ion ion-md-trash"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
            <?php 
                      }else{
                        echo "<span>Nenhum dado cadastrado</span>";
                      }
                    ?>
             <!-- Modal Add novo Conteudo-->
                  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Adicionar Conteúdo</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="../config/funcoes.php?code=1" method="post">
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Título</label>
                                  <input type="text" class="form-control" name="titulo" id="formGroupExampleInput" placeholder="Título do banner">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Descrição</label>
                                  <textarea type="text" class="form-control" name="descricao" id="formGroupExampleInput2" placeholder="Descrição"></textarea>
                                </div>      
                        </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                              </div>
                          </form>
                      </div>
                    </div>
                  </div><!-- Modal Add content-->
                  <!-- Modal Deletar-->
                    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Tem certeza que deseja deletar?
                          </div>
                          <div class="modal-footer">
                            <form action="../config/funcoes.php?code=2&id=<?php echo $show['inicial_id']?>" method="post">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Deletar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>  <!-- modal delete -->
                    <!-- Modal Editar-->
                    <div class="modal fade" id="modalUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Atualizar Registro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="../config/funcoes.php?code=3&id=<?php echo $show['inicial_id']?>" method="post">
                          <div class="modal-body">
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Título</label>
                                  <input type="text" class="form-control" name="titulo" value="<?php echo $show['inicial_titulo']  ?>" id="formGroupExampleInput" placeholder="Título do banner">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Descrição</label>
                                  <textarea type="text" class="form-control" name="descricao" " id="formGroupExampleInput2" placeholder="Descrição"><?php echo $show['inicial_descricao']  ?></textarea>
                                </div>      
                          </div>
                          <div class="modal-footer">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>  <!-- modal Editar -->
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