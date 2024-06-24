<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!defined('ROOT_PATH')) {
    // Definir o caminho absoluto da raiz do projeto
    define('ROOT_PATH', dirname(__DIR__) . '/restaurante/');
}

// Incluir conexão com o BD
include_once ROOT_PATH . "conexao.php";


$id_acesso = 0;

if (isset($_SESSION['id'])) {
    $id_user = $_SESSION['id'];
    // Consulta para recuperar os dados do usuário
    $query_usuario = "SELECT email, ultimo_acesso
                FROM usuario
                WHERE id = $id_user
                LIMIT 1";

    $result_nav_user = mysqli_query($conexao, $query_usuario);

    $usuario = mysqli_fetch_assoc($result_nav_user);

    $email = $usuario['email'];
    $id_acesso = $_SESSION['id_acesso'];
    $ult_acesso = $usuario['ultimo_acesso'];

    $urlPerfil = $id_acesso == 1 ? "$url/adm/index.php" : "$url/cliente/alterar_perfil.php";
}

$isLoggedIn = isset($_SESSION['id']);
?>
<?php include_once ROOT_PATH . "partials/carrinho.php"; ?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="menu_flutuante">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $url ?>/index.php">
            <img src="<?php echo $url ?>/assets/images/logos/logonavbar.png" class="logomenu" width="80px" alt="LOGO">
        </a>
        <div class="bloco_central"></div> <!-- Bloco Branco -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- LINKS NAV BAR -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav justify-content-center flex-grow-1 ">
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 fw-bold" href="<?php echo $url ?>/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 fw-bold" href="<?php echo $url ?>/cardapio.php">Cardápio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 fw-bold" href="<?php echo $url ?>/contato.php">Fale Conosco</a>
                </li>
            </ul>
            <?php
            if (isset($_SESSION['id'])) {
                $idUsuario = $_SESSION['id'];
            }

            // Preparar a consulta
            $query = "SELECT quantidade FROM carrinho WHERE idUsuario = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param('i', $idUsuario);

            // Executar a consulta
            $stmt->execute();
            $stmt->bind_result($quantidade);
            $total_cart_items = 0;
            while ($stmt->fetch()) {
                $total_cart_items += $quantidade;
            }

            $stmt->close();
            ?>

            <?php if ($id_acesso != 1) : ?>
            <a class="btn btn-primary position-relative fa" type="button" <?php if ($isLoggedIn) : ?> data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart" <?php else : ?> href="http://localhost/restaurante/login/login.php" <?php endif; ?>>
                <i class="fas fa-shopping-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php echo $total_cart_items; ?>
                </span>
            </a>
            <?php else : ?>
            <?php endif; ?>

            <div class="btn-container">
                <span id="controle_zoom">
                    <a href="javascript:void(0);" id="btnAumentar">A+</a> | <a href="javascript:void(0);" id="btnDiminuir">A-</a>
                </span>
            </div>

            <div class="dark-mod">
                <input type="checkbox" class="checkbox" id="chk" />
                <label class="label" for="chk">
                    <i class="fas fa-moon"></i>
                    <i class="fas fa-sun"></i>
                    <div class="ball"></div>
                </label>
            </div>
            <?php
            if (isset($id_user)) {
                // Usuário está logado
                echo <<< icon
                                    <!-- BOTÃO LOGADO -->
                                    <div class="dropdown">
                                        <button class="botaologado mx-4" type="button" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu shadow w-220px p-3">
                                            <ul class="">
                                                <li>
                                                    <span class="info-user">
                                                        $email
                                                    </span>
                                                </li>
                                                <br>
                                                <li>
                                                    <span class="info-user">
                                                        Último Acesso:
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="info-user">
                                                        $ult_acesso
                                                    </span>
                                                </li>
                                                
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>

                                                <li>
                                                    <a class="text-light" href="$urlPerfil">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                                                        </svg>
                                                        <span class="ms-2">
                                                            Perfil
                                                        </span>
                                                    </a>
                                                </li>
                
                                                <li>
                                                    <a class="text-light" href="$url/partials/logout.php">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                        </svg>
                                                        <span class="ms-2">
                                                            Sair
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                icon;
            } else {
                // Usuário não está logado
                echo '<a href="http://localhost/restaurante/login/login.php" class="botaologin justify-content-end mx-4">Login</a>';
            }
            ?>
        </div>
    </div>
</nav>
