<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/logos/icon_logo.png" type="image/x-icon">
    <title>Sabor Bom Sucesso Restaurante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="http://localhost/restaurante/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Link do google para icon-->
    <link rel="stylesheet" href="../assets/css/adm/styleAdmin.css">
</head>

<body>
    <div class="bloco_protecao"></div> <!-- Bloco Branco -->
    <div class="d-flex flex-column wrapper" >
        <!-- NAVBAR -->
        <?php include_once "../../navbar.php"; ?>
        

          <!-- Conteúdo principal -->
          <main class="flex-fill" id="profile">

             <!-- Conteúdo LATERAL -->
             <?php include_once "../partials/nav_lateral_adm.php"; ?>
            
            <section data-current-page="perfil" >
              <div class="container">
                  <div class="row">
                    <div class="col-12 my-4">
                      <div class="row">
                        <div class="fundo_bloco p-4 pt-0">
                          <div class="row">
                              <div class="col-md-2 col-sm-12 py-4 d-flex align-items-center">
                                <h5 class="text-white m-0">
                                  Financeiro
                                </h5>
                              </div>

                              <div class="col-md-3 col-sm-12 py-4">
                                <div class="input-group d-flex align-items-center">
                                    <input type="text" class="form-control" id="searchInput" placeholder="Buscar aqui">
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-12 d-flex align-items-center">
                                <h5 class="text-white m-0">
                                    <span class="float-left">Valor Total</span>
                                    <span id="valorTotal" class="m-2 float-right"></span>
                                </h5>
                              </div>
                          </div>

                            <!-- Bloco qualquer -->
                            <div class="">
                              <div class="tabela">
                                  <div class="lista_admin_fale_conosco">
                                    <table class="table quebra_cliente">
                                      <thead>
                                            <tr>
                                              <th class="px-4">Nome</th>
                                              <th class="px-2">Data</th>
                                              <th class="px-2">Forma de pagamento</th>
                                              <th class="px-2">Status</th>
                                              <th class="px-2">Valor</th>
                                              <th class="px-2">Detalhes</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabela_body">
                                            <?php 
                                              include_once "./action/adminFinanceiro.php";
                                              echo response($registros, $conexao);
                                            ?>
                                        </tbody>
                                    </table>
                                  </div>                              
                                </div>
                        </div>
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
        <script src="http://localhost/restaurante/assets/js/dk.js"></script>
        <script src="<?php echo $url?>assets/js/fonte.js"></script>
        <script src="http://localhost/restaurante/assets/js/script.js"></script>
    </body>

</html>
