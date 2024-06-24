<?php
include_once('conexao.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$query_cardapio = "SELECT * FROM cardapio";
$resultado_cardapio = mysqli_query($conexao, $query_cardapio);

if (isset($_GET['adicionar'])) {
    if(!$_SESSION['id']){
        header("Location:$url/login/login.php" );
    }else{
    $idCardapio = (int)$_GET['id'];
    $idUsuario = (int)$_SESSION['id'];
    $quantidade = 1;

    // Verifica se o item já está no carrinho
    $stmt = $conexao->prepare('SELECT quantidade FROM carrinho WHERE idUsuario = ? AND idCardapio = ?');
    $stmt->bind_param('ii', $idUsuario, $idCardapio);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Atualiza a quantidade
        $stmt->bind_result($quantidade_atual);
        $stmt->fetch();
        $nova_quantidade = $quantidade_atual + 1;

        $stmt_update = $conexao->prepare('UPDATE carrinho SET quantidade = ? WHERE idUsuario = ? AND idCardapio = ?');
        $stmt_update->bind_param('iii', $nova_quantidade, $idUsuario, $idCardapio);
        $stmt_update->execute();
        $stmt_update->close();
    } else {
        // Insere um novo item
        $stmt_insert = $conexao->prepare('INSERT INTO carrinho (idUsuario, idCardapio, quantidade) VALUES (?, ?, ?)');
        $stmt_insert->bind_param('iii', $idUsuario, $idCardapio, $quantidade);
        $stmt_insert->execute();
        $stmt_insert->close();
    }

    $stmt->close();

    // Redireciona para evitar reenvio do formulário
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
}

// Calcula a quantidade total de itens no carrinho para o usuário
$total_items = 0;
if (isset($_SESSION['idUsuario'])) {
    $stmt = $conexao->prepare('SELECT SUM(quantidade) AS total FROM carrinho WHERE idUsuario = ?');
    $stmt->bind_param('i', $_SESSION['idUsuario']);
    $stmt->execute();
    $stmt->bind_result($total_items);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/logos/icon_logo.png" type="image/x-icon">
    
    <title>Sabor Bom Sucesso Restaurante</title>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <!-- custom css  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/framework/bootstrap.min.css">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="assets/css/framework/swiper-bundle.min.css">

    <!-- fancy box  -->
    <link rel="stylesheet" href="assets/css/framework/jquery.fancybox.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="assets/css/style.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body>

    <div class="bloco_protecao"></div> <!-- Bloco Branco -->

    <div class="d-flex flex-column wrapper">
        <!-- NAVBAR -->
        <?php include_once "./navbar.php"; ?>
       
      
        <!-- Conteúdo principal -->

        <!--CARDAPIO-->
        <main class="flex-fill">
       
        <section>
            <div class="container-fluid">
                <div class="row mt-5">
                    <?php while($row_cardapio = mysqli_fetch_assoc($resultado_cardapio)){?>
                        <div class="mt-5 col-lg-3 col-sm-12 col-md-6">
                            <div class="card pedido text-center">
                                <img class="imagemcard" src="./adm/uploads/<?php echo $row_cardapio['imagem'];?>" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <div class="content mb-3">
                                        <div class="pedido-heart">
                                            <i class="fa-solid fa-heart"></i>
                                        </div>
                                        <h5 class="card-title"><?php echo $row_cardapio['nome']; ?></h5>
                                        <p class="card-text" style="text-align: justify !important;"><?php echo $row_cardapio['descricao']; ?></p>
                                    </div>

                                    <div class="pedido-rate content">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <span>(500+)</span>
                                    </div>

                                    <div class="pedido-pric">
                                        <div class="content mb-3 mt-3">
                                            <h4>R$ <?php echo $row_cardapio['preco']; ?></h4>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn-default cardapio me-3">
                                                Comprar
                                            </button>
                                            <div class="addcarrinho">
                                                <a href="?adicionar&id=<?php echo $row_cardapio['id']; ?>" class="cardapio">
                                                    <button class="btn-default cardapio add-to-cart">
                                                        <i class="fa-solid fa-basket-shopping mx-2"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        </main>














        <!-- FOOTER -->
        <?php include "./partials/footer.php"; ?>
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

    </div>
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
  const mp = new MercadoPago("YOUR_PUBLIC_KEY");
</script>
    <script>
        AOS.init();
    </script>


</body>

</html>