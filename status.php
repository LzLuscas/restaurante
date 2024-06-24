<?php
include_once('./conexao.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$id_user_checkout = $_SESSION['id'];
$query_checkout_endereco = "SELECT * FROM endereco WHERE idUsuario = $id_user_checkout";
$resultado_endereco = mysqli_query($conexao, $query_checkout_endereco);
$resultado = mysqli_fetch_assoc($resultado_endereco);

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message = '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/logos/icon_logo.png" type="image/x-icon">
    <title>Sabor Bom Sucesso Restaurante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Link do google para icon-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var message = "<?php echo $message; ?>";
            if (message) {
                alert(message);
            }
        });
    </script>
</head>

<body>
    <div class="bloco_protecao"></div> <!-- Bloco Branco -->
    <div class="d-flex flex-column wrapper">
        <!-- NAVBAR -->
        <!-- NAVBAR -->
        <?php include_once "./navbar.php"; ?>


        <!-- Conteúdo principal -->
        <main class="flex-fill" id="profile">

            <!-- Blocos de Informações  -->
            <div class="container">
                <div class="row justify-content-center m-5 fundo_bloco_status">
                    <div class="titulo fw-bold">Saiu para entrega</div>

                    <div class="container-progresso">
                        <div class="etapa">
                            <div class="circulo checked"></div>
                            <div class="rotulo">Em Preparo</div>
                        </div>
                        <div class="etapa">
                            <div class="circulo "></div>
                            <div class="rotulo">Em Rota</div>
                        </div>
                        <div class="etapa">
                            <div class="circulo"></div>
                            <div class="rotulo">Entregue</div>
                        </div>
                        <div class="barra-progresso"></div>
                    </div>

                    <!-- caixa de endereço -->
                    <div class="col-md-3 content">
                        <div class="container_status">

                            <lu class="lista_checkout">
                                <div class="bloco_geral_status">
                                    <div>
                                        <li>
                                            <h4>Informações Sobre Endereço</h4>
                                        </li>
                                        <li>
                                            <p style="text-transform: uppercase;"><?php echo $resultado['rua'] ?> , <?php echo $resultado['numero'] ?></p>
                                        </li>
                                        <li>
                                            <p style="text-transform: uppercase;"><?php echo $resultado['complemento'] ?></p>
                                        </li>
                                        <li>
                                            <p style="text-transform: uppercase;"><?php echo $resultado['cidade'] ?> , <?php echo $resultado['bairro'] ?> - <?php echo $resultado['estado'] ?></p>
                                        </li>
                                    </div>
                                </div>
                            </lu>

                        </div>
                    </div>

                    <!-- caixa de produtos -->
                    <div class="col-md-3 content">
                        <div class="container_status">

                            <lu class="lista_status">
                                <div class="bloco_geral_status">
                                    <div>
                                        <li>
                                            <h4>Informações do Pedido</h4>
                                        </li>
                                        <li><a href="#">Ver detalhes do pedido</a></li>
                                    </div>
                                </div>
                            </lu>

                        </div>
                    </div>


                </div>
            </div>


        </main>

        <?php include "./partials/footer.php"; ?>

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
        AOS.init();
    </script>
</body>

</html>