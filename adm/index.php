<?php 
    // Incluir conexão com o BD
    include_once "../conexao.php";

    session_start();
    if ($_SESSION['id_acesso'] != 1) {
        header('Location:../login/login.php');
    }
    
    $query_info_adm = "SELECT usuario, senha_usuario FROM usuario WHERE id_acesso = 1";
    $result = mysqli_query($conexao, $query_info_adm);
    $adm = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/logos/icon_logo.png" type="image/x-icon">
    <title>Sabor Bom Sucesso Restaurante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Link do google para icon-->
</head>

<body>
    <div class="bloco_protecao"></div> <!-- Bloco Branco -->
    <div class="d-flex flex-column wrapper" >
        <!-- NAVBAR -->
        <?php include_once "../navbar.php"; ?>
        

          <!-- Conteúdo principal -->
          <main class="flex-fill" id="profile">

             <!-- Conteúdo LATERAL -->
            <?php include_once "./partials/nav_lateral_adm.php"; ?>

            
            <section data-current-page="perfil" >
              <div class="container m-0">
                <div class="row justify-content-center">
                  <div class="col-lg-6 col-md-8 my-4">
                    <div class="row">

                      <div class="fundo_bloco">
                        <div class="row p-3">
                          <div class="col-md-10 col-xs-12 px-0">
                            <h5 class="text-white">
                              Informações da Conta ADMIN
                            </h5>
                          </div>
                          <div class="row justify-content-center custom-form">
                            <div class="col-lg-8 my-5">
                              <form>

                                <div class="card bb">
                                  <h6 class="nome_menor">Login</h6>
                                  <p class="nome_maior" id="email_texto"><?php echo $adm["usuario"]?></p>
                                </div>

                              </form>
                            </div>
                          </div>
                        </div>
                      </div>      
                    </div>               
                  </div> 
                </div>
              </div>

              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
              
                    <div class="modal-header">
                      <h4 class="modal-title">Atualizar Dados</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
              
                    <div class="modal-body">
                      <form>
                        <div class="mb-3">
                          <label for="login" class="form-label">Login:</label>
                          <input type="text" class="form-control" placeholder="Digite seu login">
                        </div>
                        <div class="mb-3">
                          <label for="senha" class="form-label">Senha:</label>
                          <input type="password" class="form-control" placeholder="Digite sua senha">
                        </div>
                      </form>
                    </div>
              
                    <div class="modal-footer">
                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Salvar Alterações</button>
                    </div>
              
                  </div>
                </div>
              </div>
              
              




            </section>
      
          </main>
    </div>

    <!-- Script do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="../assets/js/dk.js"></script>
        <script src="http://localhost/restaurante/assets/js/script.js"></script>
        <script src="http://localhost/restaurante/assets/js/fonte.js"></script>
    </body>

</html>
