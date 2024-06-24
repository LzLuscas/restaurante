<?php
//inicia a conexao do banco 1 vez
include_once("conexao.php");
session_start();
echo "Conf";

$chave = filter_input(INPUT_GET, "chave", FILTER_SANITIZE_STRING);

if (!empty($chave)) {
    echo "Chave: $chave <br>";

    $consultaChave = "SELECT id FROM usuario WHERE chave = '$chave' LIMIT 1";
    $resultadoChave = mysqli_query($conexao, $consultaChave);

    if (mysqli_num_rows($resultadoChave) > 0) {
        $row_usuario = $resultadoChave->fetch_assoc();
        $_SESSION['id'] = $row_usuario['id'];
        
        $query_up_usuario = "UPDATE usuario SET situacao = 'ativo' WHERE id = {$_SESSION['id']}";

        $up_usuario = mysqli_query($conexao, $query_up_usuario);
        if ($up_usuario) {
            $mensagem = "E-mail Confirmado.";
            // Redirecionar para a página de cadastro com a mensagem de erro
            header('Location: login/login.php?mensagem=' . urlencode($mensagem));
            exit();
        } else {
            $mensagem = "Endereço inválido. Tente novamente.";
            $_SESSION["msg"] = $mensagem;
            // Redirecionar para a página de cadastro com a mensagem de erro
            header('Location: login/cadastrar.php?mensagem=' . urlencode($mensagem));
            exit();
        }
    } else {
        echo "Nenhuma linha retornada pela consulta SQL.";
    }
} else {
    echo "Chave está vazia.";
}

