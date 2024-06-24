<?php
// Incluir conexão com o BD
include_once "../../conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Remove o prato
    $sql = "DELETE FROM cardapio WHERE id = $id";
    if (mysqli_query($conexao, $sql) === TRUE) {
        header('Location: admin_pratos.php');
    } else {
        echo "Erro ao deletar o prato: " . mysqli_error($conexao);
    }
}
?>
