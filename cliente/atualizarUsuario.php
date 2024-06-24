<?php
include_once('../conexao.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$id = isset($_POST['id']) ? $_POST['id'] : null;
if ($id) {
    $fieldsToUpdate = [];

    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
        $fieldsToUpdate[] = "nome = '$nome'";
    }

    if (isset($_POST['dataNascimento'])) {
        $dataNascimento = $_POST['dataNascimento'];
        if (DateTime::createFromFormat('Y-m-d', $dataNascimento) !== false) {
            $fieldsToUpdate[] = "dataNascimento = '$dataNascimento'";
        } else {
            echo "Data de nascimento inválida.";
            exit;
        }
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $fieldsToUpdate[] = "email = '$email'";
    }

    if (isset($_POST['telefone'])) {
        $telefone = $_POST['telefone'];
        $fieldsToUpdate[] = "telefone = '$telefone'";
    }

    if (isset($_POST['celular'])) {
        $celular = $_POST['celular'];
        $fieldsToUpdate[] = "celular = '$celular'";
    }

    if (isset($_POST['senha_usuario'])) {
        $senha_usuario = $_POST['senha_usuario'];
        $senhaCriptografada = password_hash($senha_usuario, PASSWORD_DEFAULT);
        $fieldsToUpdate[] = "senha_usuario = '$senhaCriptografada'";


    }

    if (!empty($fieldsToUpdate)) {
      
        $sql = "UPDATE usuario SET " . implode(', ', $fieldsToUpdate) . " WHERE id = $id";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            echo "Usuário atualizado com sucesso!";
            header('Location: ./alterar_perfil.php');
        } else {
            echo "Erro ao atualizar o usuário: " . mysqli_error($conexao);
        }
    } else {
        echo "Nenhum campo para atualizar.";
    }
} else {
    echo "ID do usuário não fornecido.";
}
?>

