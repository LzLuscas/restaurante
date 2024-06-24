<?php
include_once "../conexao.php";

// Verificar a conexão
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}


if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$id_user = $_SESSION['id'];

$sql = "SELECT * FROM pedidos WHERE idUsuario = $id_user";
$result = mysqli_query($conexao, $sql);

if (!$result) {
    die("Erro ao executar a consulta: " . mysqli_error($conexao));
}
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

        <!-- carrinho lateral -->
        <?php include_once "../partials/carrinho.php"; ?>
        

          <!-- Conteúdo principal -->
          <main class="flex-fill" id="profile">

             <!-- Conteúdo LATERAL -->
            <?php include_once "./partials/nav_lateral_cliente.php"; ?>

            <section data-current-page="perfil" >
              <div class="container">
                <div class="row">
                  <div class="col-12 my-4">
                    <div class="row">

                      <div class="fundo_bloco">
                        <div class="row p-3">
                          <div class="col-md-10 col-sm-12 px-0">
                            <h5 class="text-white">
                              Últimos Pedidos
                            </h5>
                          </div>

                            <!-- Bloco qualquer -->
                            <div class="mt-2">
                              <div class="card">
                                  <div class="lista_compras">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th>N° do Pedido</th>
                                          <th>Pedidos</th>
                                          <th>Data de Compra</th>
                                          <th>Preço Total</th>
                                          <th>Situação</th>
                                          <th>Ação</th>
                                          <th></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                          if (mysqli_num_rows($result) > 0) {
                                              while ($row = mysqli_fetch_assoc($result)) {
                                                  echo "<tr>";
                                                  echo "<td>" . htmlspecialchars($row["idPedidos"]) . "</td>";
                                                  echo "<td>" . htmlspecialchars($row["totalProdutos"]) . "</td>";
                                                  echo "<td>" . htmlspecialchars($row["dataPedido"]) . "</td>";
                                                  echo "<td>" . htmlspecialchars($row["totalPreco"]) . "</td>";
                                                  echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                                                  echo "<td>
                                                      <a href='#' class='lista_admin_fale_conosco_botao m-1' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                                              <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0'/>
                                                              <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7'/>
                                                          </svg>
                                                      </a>
                                                      <a href='#' id='mostrarMensagem' class='lista_admin_fale_conosco_botao'>
                                                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus-fill' viewBox='0 0 16 16'>
                                                              <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0'/>
                                                          </svg>
                                                      </a>
                                                    </td>";
                                                  echo "</tr>";
                                              }
                                          } else {
                                              echo "<tr><td colspan='6'>Nenhum dado encontrado</td></tr>";
                                          }

                                          mysqli_close($conexao);
                                      ?>
                                      </tbody>
                                    </table>
                                  </div>                              
                                </div>
                            </div>

                        </div>

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

                        

                      </div>
            </section>
      
          </main>
    </div>
    <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
    <!-- Script do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="../assets/js/script.js"></script>
        <script src="../assets/js/dk.js"></script>
    </body>

</html>
