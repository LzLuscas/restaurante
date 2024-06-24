<?php
include_once('./conexao.php');

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$id_user_checkout = $_SESSION['id'];
$query_checkout_endereco = "SELECT * FROM endereco WHERE idUsuario = $id_user_checkout";
$resultado_endereco = mysqli_query($conexao, $query_checkout_endereco);

$query_usuario = "SELECT nome,celular FROM usuario WHERE id = $id_user_checkout";
$resultado_usuario_checkout = mysqli_query($conexao, $query_usuario);

if ($resultado_usuario_checkout) {
  // Verifica se há pelo menos uma linha retornada
  if (mysqli_num_rows($resultado_usuario_checkout) > 0) {
    // Obtém os dados da primeira linha (supondo que você esteja interessado apenas no primeiro resultado)
    $row_usuario = mysqli_fetch_assoc($resultado_usuario_checkout);

    // Agora você pode acessar os dados normalmente
    $nomeUsuario = $row_usuario['nome'];
    $celularUsuario = $row_usuario['celular'];
    // E assim por diante para outras colunas que você está tentando acessar
  } else {
    echo "Nenhum usuário encontrado.";
  }
} else {
  // Se houver um erro na consulta
  echo "Erro na consulta: " . mysqli_error($conexao);
}

// Liberar resultado
mysqli_free_result($resultado_usuario_checkout);

$query_idEndereco = "SELECT id FROM endereco WHERE idUsuario = $id_user_checkout";
$resultado_idEndereco = mysqli_query($conexao, $query_idEndereco);
$row_idEndereco = mysqli_fetch_assoc($resultado_idEndereco);
$idEndereco = $row_idEndereco['id'];

$query_carrinho_checkout = "
    SELECT c.idCardapio, p.nome, p.preco, p.imagem, c.quantidade
    FROM carrinho c 
    JOIN cardapio p ON c.idCardapio = p.id 
    WHERE c.idUsuario = '$id_user_checkout'
";
$resultado_pedido = mysqli_query($conexao, $query_carrinho_checkout);

$query = "SELECT SUM(c.quantidade * p.preco) AS total FROM carrinho c JOIN cardapio p ON c.idCardapio = p.id WHERE c.idUsuario = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($total);
$stmt->fetch();
$stmt->close();


$totalFormatado = number_format($total, 2);
$idUsuario = $_SESSION['id'];


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/images/logos/icon_logo.png" type="image/x-icon">
  <title>Sabor Bom Sucesso Restaurante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/carrinho/checkout.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Link do google para icon-->

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>

<body>
  <div class="bloco_protecao"></div> <!-- Bloco Branco -->
  <div class="d-flex flex-column wrapper">
    <!-- NAVBAR -->

    <!-- Conteúdo principal -->
    <main class="flex-fill" id="profile">
      <!-- NAVBAR -->
      <?php include_once "./navbar.php"; ?>

      <!-- carrinho lateral -->
      <?php include_once "./partials/carrinho.php"; ?>

      <!-- Blocos de Informações  -->
      <div class="container">
        <div class="row justify-content-center m-5 fundo_bloco_checkout">
          <!-- caixa de endereço -->
          <div class="col-md-6 content">
            <div class="titulo_checkout text-center">Endereço de entrega</div>
            <div class="container_checkout">
              

                <?php
                while ($row_endereco = mysqli_fetch_assoc($resultado_endereco)) {
                  $rua = $row_endereco['rua'];
                  $numero = $row_endereco['numero'];
                  $complemento = $row_endereco['complemento'];
                  $bairro = $row_endereco['bairro'];
                  $cidade = $row_endereco['cidade'];
                  $uf = $row_endereco['estado'];
                  $cep = $row_endereco['CEP'];
                  $idEndereco = $row_endereco['id']; // Adiciona esta linha para pegar o ID do endereço

                  echo <<<card
                                <lu class="lista_checkout">
                                    <div class="bloco_geral_checkout">
                                        <div class="lista_checkout_bolinha"><input class="form-check-input" type="radio" name="addressOptions" value="$idEndereco" checked></div>
                                        <div>
                                            <li style="visibility: hidden;">$idEndereco</li>
                                            <li>$rua, $numero - $complemento</li>
                                            <li>$bairro | $cidade - $uf</li>
                                            <li>$cep</li>
                                        </div>
                                        <div class="lista_checkout_fechar">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg acao_fechar" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </lu>
                                card;
                }
                ?>
            </div>

          </div>


          <!-- caixa de produtos -->
          <div class="col-md-6 content">
            <div class="titulo_checkout text-center">Itens</div>
            <div class="container_checkout_produtos">
              <?php
              $subt = 0;
              while ($row_pedido = mysqli_fetch_assoc($resultado_pedido)) {
                $imagem_prato_checkout = $row_pedido['imagem'];
                $preco_prato = $row_pedido['preco'];
                $nome_prato = $row_pedido['nome'];
                $qtd = $row_pedido['quantidade'];
                $preco_total = $qtd * $preco_prato;
                $subt += $preco_total;
                echo <<<card
                                <lu class="lista_checkout">
                                    <div class="bloco_geral_checkout_valor">
                                        <div class="lista_checkout_bolinha">
                                            <img src="./adm/uploads/$imagem_prato_checkout" alt="Imagem" width="100" class="img-fluid">
                                        </div>
                                        <div>
                                            <li class="fs-5 text">$nome_prato - R$ $preco_prato</li>
                                            <li class="fw-light">Quantidade: $qtd</li>
                                            <li class="fw-light">Preço total: R$ $preco_total</li> 
                                        </div>
                                        <div class="lista_checkout_fechar">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg acao_fechar" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </lu>
                                card;
              }
              $taxa = $subt * 0.1;
              ?>
            </div>
          </div>
          <form method="POST" action="confirmarCheckOut.php">
          <input type="hidden" name="idPedidos" value="<?= $idPedidos; ?>">
          <input type="hidden" name="totalProdutos" value="<?= $total_cart_items; ?>">
          <input type="hidden" name="totalPreco" value="<?= $subt + $taxa ?>">
          <input type="hidden" name="nome" value="<?= $nomeUsuario ?>">
          <input type="hidden" name="celular" value="<?= $celularUsuario ?>">
          <input type="hidden" name="idEndereco" value="<?= $idEndereco ?>">
          <input type="hidden" name="dataPedido" value="<?= isset($dataPedido) ? $dataPedido : '' ?>">
          <input type="hidden" name="status" value="<?= isset($status) ? $status : '' ?>">
          <div class="bloco_acao text-center" style="display:flex;">
            <button type="submit" class="btn bloco_confirmar" style="height:50px;" >Confirmar</button>
            <button type="button" class="btn bloco_adicionar" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-left: 20px !important; height:50px;">Adicionar</button>
          </div>
          </form>
          <!-- caixa de total -->
          <div class="col-md-6 content">
            <div class="titulo_checkout text-center">
              Resumo do Pedido
            </div>
            <div class="container_checkout_valor">
              <lu class="lista_checkout">
                <div class="bloco_geral_checkout_valor">
                  <div class="">
                    <lu>
                      <li>Subtotal:</li>
                      <li>Taxa de Serviço:</li>
                      <li class="fw-bold">Total:</li>
                    </lu>
                  </div>
                  <div class="valores">
                    <lu>
                      <li>R$ <?php echo $subt ?></li>
                      <li>R$ <?php echo $taxa ?></li>
                      <li>R$ <?php echo $subt + $taxa ?></li>
                    </lu>
                  </div>
                </div>
              </lu>
            </div>
          </div>
        </div>

        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title">Novo endereço</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" id="cep" class="form-control" placeholder="Digite seu CEP" required onkeypress="$(this).mask('00000-000')">
                  </div>
                  <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" id="endereco" class="form-control" placeholder="Digite seu endereço">
                  </div>
                  <div class="mb-3">
                    <label for="numero" class="form-label">Número</label>
                    <input type="text" id="numero" class="form-control" placeholder="Digite o número">
                  </div>
                  <div class="mb-3">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" id="bairro" class="form-control" placeholder="Digite seu bairro">
                  </div>
                  <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" id="cidade" class="form-control" placeholder="Digite sua cidade">
                  </div>
                </form>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn bloco_adicionar" data-bs-dismiss="modal">Adicionar</button>
              </div>

            </div>
          </div>
        </div>
      </div>
  </div>
  </main>

  <!-- FOOTER -->
  <?php include "./partials/footer.php"; ?>

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
  <script src="assets/js/framework/jquery-3.5.1.min.js"></script>
  <!-- bootstrap -->
  <script src="assets/js/framework/bootstrap.min.js"></script>
  <script src="assets/js/framework/popper.min.js"></script>

  <!-- fontawesome  -->
  <script src="assets/js/framework/font-awesome.min.js"></script>

  <!-- swiper slider  -->
  <script src="assets/js/framework/swiper-bundle.min.js"></script>

  <!-- mixitup -- filter  -->
  <script src="assets/js/framework/jquery.mixitup.min.js"></script>

  <!-- fancy box  -->
  <script src="assets/js/framework/jquery.fancybox.min.js"></script>

  <!-- parallax  -->
  <script src="assets/js/framework/parallax.min.js"></script>

  <!-- gsap  -->
  <script src="assets/js/framework/gsap.min.js"></script>

  <!-- scroll trigger  -->
  <script src="assets/js/framework/ScrollTrigger.min.js"></script>
  <!-- scroll to plugin  -->
  <script src="assets/js/framework/ScrollToPlugin.min.js"></script>
  <!-- rellax  -->
  <!-- <script src="assets/js/framework/rellax.min.js"></script> -->
  <!-- <script src="assets/js/framework/rellax-custom.js"></script> -->
  <!-- smooth scroll  -->
  <script src="assets/js/framework/smooth-scroll.js"></script>
  <!-- custom js  -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/dk.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/fonte.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>