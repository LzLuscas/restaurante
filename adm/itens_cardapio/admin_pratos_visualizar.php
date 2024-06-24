<?php
// Incluir conexão com o BD
include_once "../../conexao.php";

if (!isset($_GET['id'])) {
    echo "ID não fornecido.";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM cardapio WHERE id='$id'";
$result = mysqli_query($conexao, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Prato não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Prato</title>
    <!-- Inclua seu CSS e outros cabeçalhos aqui -->
</head>
<body>
    <h1>Visualizar Prato</h1>
    <p><strong>Nome:</strong> <?php echo $row['nome']; ?></p>
    <p><strong>Descrição:</strong> <?php echo $row['descricao']; ?></p>
    <p><strong>Preço:</strong> <?php echo $row['preco']; ?></p>
    <p><strong>Status:</strong> <?php echo $row['status'] ? 'Ativo' : 'Inativo'; ?></p>
    <a href="admin_pratos.php">Voltar</a>
</body>
</html>

<?php
  mysqli_close($conexao);
?>
