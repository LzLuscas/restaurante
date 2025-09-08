<?php
session_start();
ob_start();

// Define o fuso horário
date_default_timezone_set('America/Sao_Paulo');
include_once "../../conexao.php";

// Verifica se o formulário foi enviado
if (isset($_POST['ValCodigo'])) {
    
    // Valida e filtra os dados recebidos
    $codigo_digitado = filter_input(INPUT_POST, 'codigo_autenticacao', FILTER_SANITIZE_NUMBER_INT);

    // Verifica se as sessões temporárias existem
    if (!isset($_SESSION['id_temp']) || !isset($_SESSION['usuario_temp'])) {
        $mensagem = "Sua sessão expirou. Por favor, tente fazer o login novamente.";
        header("Location: login.php?mensagem=" . urlencode($mensagem));
        exit();
    }
    
    // 1. CORREÇÃO DE SEGURANÇA: Usa prepared statements para a consulta principal
    $query_usuario = "SELECT id, nome, usuario, email, id_acesso FROM usuario WHERE id = ? AND usuario = ? AND codigo_autenticacao = ? LIMIT 1";
    $stmt_usuario = $conexao->prepare($query_usuario);
    $stmt_usuario->bind_param("iss", $_SESSION['id_temp'], $_SESSION['usuario_temp'], $codigo_digitado);
    $stmt_usuario->execute();
    $result_usuario = $stmt_usuario->get_result();

    if ($result_usuario->num_rows === 1) {
        $usuario = $result_usuario->fetch_assoc();

        // Limpa o código de autenticação no banco de dados
        // 2. CORREÇÃO DE SEGURANÇA: Usa prepared statements para o UPDATE
        $query_up_usuario = "UPDATE usuario SET codigo_autenticacao = NULL, data_codigo_autenticacao = NULL WHERE id = ? LIMIT 1";
        $stmt_up = $conexao->prepare($query_up_usuario);
        $stmt_up->bind_param("i", $usuario['id']);
        $stmt_up->execute();

        // Destrói a sessão antiga e cria a nova sessão de usuário logado
        session_destroy();
        session_start();

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['id_acesso'] = $usuario['id_acesso'];

        // 3. CORREÇÃO DE SEGURANÇA: Usa prepared statements para o INSERT do log
        $query_log = "INSERT INTO log (idUsuario, datahora, codigo_autenticacao) VALUES (?, NOW(), ?)";
        $stmt_log = $conexao->prepare($query_log);
        $stmt_log->bind_param("is", $usuario['id'], $codigo_digitado);
        $stmt_log->execute();

        // 4. CORREÇÃO DE SEGURANÇA: Usa prepared statements para o UPDATE do último acesso
        $query_ultimo_acesso = "UPDATE usuario SET ultimo_acesso = NOW() WHERE id = ?";
        $stmt_acesso = $conexao->prepare($query_ultimo_acesso);
        $stmt_acesso->bind_param("i", $usuario['id']);
        $stmt_acesso->execute();

        // Redireciona para a página principal
        header('Location: ' . $url . '/index.php');
        exit();
    } else {
        $mensagem = "Erro: Código inválido!";
        header('Location: validar_codigo.php?mensagem=' . urlencode($mensagem));
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar Código</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body class="body">
    <main class="d-flex align-items-center justify-content-center">
        <div class="form-container" id="form-container">
            <form method="POST" action="">
                <p class="p-1" style="color: #d2b48c !important; text-align: center;">Código de Verificação</p>
                <p style="color: #fff; text-align: center; font-size: 0.9rem;">Um código foi enviado para o seu e-mail.</p>

                <div class="input-box"> 
                    <input type="text" class="input" name="codigo_autenticacao" placeholder="Digite o código" required autofocus>
                </div>

                <input type="submit" name="ValCodigo" value="Validar" class="next input">

                <div class="text-center mt-3">
                    <a href="reenviar_codigo.php" class="esqueceu-senha validarcod" style="color: #d2b48c !important;">Reenviar código?</a>
                </div>
            </form>
        </div>
    </main>

    <script>
        // Script para exibir a mensagem de retorno do PHP
        window.onload = function () {
            const urlParams = new URLSearchParams(window.location.search);
            const mensagem = urlParams.get('mensagem');
            if (mensagem) {
                alert(decodeURIComponent(mensagem.replace(/\+/g, ' ')));
            }
        };
    </script>
</body>
</html>