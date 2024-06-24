<?php
include_once('../conexao.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$idUsuario = $_SESSION['id'] ?? null;
$id = $_POST['id'] ?? null;

if ($idUsuario) {
    $fieldsToUpdate = [];

    if (!empty($_POST['CEP'])) {
        $CEP = mysqli_real_escape_string($conexao, $_POST['CEP']);
        $fieldsToUpdate[] = "CEP = '$CEP'";
    }

    if (!empty($_POST['rua'])) {
        $rua = mysqli_real_escape_string($conexao, $_POST['rua']);
        $fieldsToUpdate[] = "rua = '$rua'";
    }

    if (!empty($_POST['numero'])) {
        $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
        $fieldsToUpdate[] = "numero = '$numero'";
    }

    if (!empty($_POST['complemento'])) {
        $complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
        $fieldsToUpdate[] = "complemento = '$complemento'";
    }

    if (!empty($_POST['cidade'])) {
        $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
        $fieldsToUpdate[] = "cidade = '$cidade'";
    }

    if (!empty($_POST['estado'])) {
        $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
        $fieldsToUpdate[] = "estado = '$estado'";
    }

    if (!empty($_POST['bairro'])) {
        $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
        $fieldsToUpdate[] = "bairro = '$bairro'";
    }

    if (!empty($fieldsToUpdate)) {
        $sql = "UPDATE endereco SET " . implode(', ', $fieldsToUpdate) . " WHERE id = $id";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            echo "Endereço atualizado com sucesso!";
            header('Location: ./alterar_endereco.php');

        } else {
            echo "Erro ao atualizar o endereço: " . mysqli_error($conexao);
        }
    } else {
        echo "Nenhum campo para atualizar.";
    }
} else {
    echo "ID do usuário não fornecido.";
}
?>
