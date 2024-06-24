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
                          <div class="col-md-8 col-sm-12 py-4 d-flex align-items-center">
                              <h5 class="text-white m-0">
                                  Pedidos
                              </h5>
                          </div>

                          <div class="col-md-3 col-sm-12 py-4">
                              <div class="input-group d-flex align-items-center">
                                  <input type="text" class="form-control" id="searchInput" placeholder="Buscar aqui">
                              </div>
                          </div>

                          <!-- Bloco qualquer -->
                          <div class="">
                            <div class="tabela">
                                <div class="lista_admin_fale_conosco">
                                  <table class="table quebra_cliente">
                                    <thead>
                                        <tr>
                                          <th>N° do Pedido</th>
                                          <th>Nome</th>
                                          <th>Endereço</th>
                                          <th>Itens</th>
                                          <th>Data do Pedido</th>
                                          <th>Preço Total</th>
                                          <th>Situação</th>
                                          <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabela_body">
                                      <?php 
                                        include_once "./action/pedidosService.php";
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

                                      <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg_e">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Detalhes do Pedido 001</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="mt-2">
                                    <div class="card">
                                        <div class="lista_admin_fale_conosco">
                                          <table class="table">
                                            <thead>
                                              <tr>
                                                <th class="px-4">Item</th>
                                                <th class="px-4">Nome</th>
                                                <th class="px-1">Descrição</th>
                                                <th class="px-1">Preço</th>
                                                <th></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td><img src="/assets/images/strogonoff-de-frango.jpg" class="img_adm_cardapio" alt="strogonoff"></td>
                                                <td>Strogonoff de Frango</td>
                                                <td>Arroz Branco, Feijão preto, Batata Frita, Salada Verde e Maionese</td>
                                                <td>27,90</td>
                                              </tr>
                                              <tr>
                                                <td><img src="/assets/images/rabada.jpg" class="img_adm_cardapio" alt="strogonoff"></td>
                                                <td>Rabada</td>
                                                <td>Arroz Branco, Feijão preto, Batata Frita, Salada Verde e Maionese</td>
                                                <td>27,90</td>
                                              </tr>
                                              <tr>
                                                <td><img src="/assets/images/parmegiana_frango.jpg" class="img_adm_cardapio" alt="strogonoff"></td>
                                                <td>Parmegiana de Frango</td>
                                                <td>Arroz Branco, Feijão preto, Batata Frita, Salada Verde e Maionese</td>
                                                <td>27,90</td>
                                              </tr>
                                              <tr>
                                                <td><img src="/assets/images/parmegiana_frango.jpg" class="img_adm_cardapio" alt="strogonoff"></td>
                                                <td>Parmegiana de Frango</td>
                                                <td>Arroz Branco, Feijão preto, Batata Frita, Salada Verde e Maionese</td>
                                                <td>27,90</td>
                                              </tr>                                                 
                                              <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Total: R$ 111,60</td>
                                              </tr>      
                                            </tbody>
                                          </table>
                                        </div>                              
                                      </div>
                                  </div>                                
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                                </div>
                              </div>
                            </div>
                          </div>



                          <!-- Modal 2 -->
                        <div class="modal fade" id="endereco_pedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Endereço</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="mb-3">
                                  <label for="cep" class="form-label">CEP:</label>
                                  <input type="text" class="form-control" id="cep" value="12345-678" readonly>
                                </div>
                                <div class="mb-3">
                                  <label for="bairro" class="form-label">Bairro:</label>
                                  <input type="text" class="form-control" id="bairro" value="Centro" readonly>
                                </div>
                                <div class="mb-3">
                                  <label for="numero" class="form-label">Número:</label>
                                  <input type="text" class="form-control" id="numero" value="123" readonly>
                                </div>
                                <div class="mb-3">
                                  <label for="complemento" class="form-label">Complemento:</label>
                                  <input type="text" class="form-control" id="complemento" value="Apto 101" readonly>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                              </div>
                            </div>
                          </div>
                        </div>
          </main>
    </div>

      <!-- Script do Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="http://localhost/restaurante/assets/js/dk.js"></script>
        <script src="http://localhost/restaurante/assets/js/script.js"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="./assets/verEnderecoRequest.js"></script>
        
        <script src="<?php echo $url?>/assets/js/fonte.js"></script>
    </body>

</html>
