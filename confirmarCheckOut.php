<?php
include_once('./conexao.php');

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$query = "SELECT SUM(c.quantidade * p.preco) AS total FROM carrinho c JOIN cardapio p ON c.idCardapio = p.id WHERE c.idUsuario = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($total);
$stmt->fetch();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<h1>" . $_POST['idEndereco'] . " </h1>";
  if (isset($_POST['idEndereco'])) {

    $idUsuario = $_SESSION['id'];
    $nome = $_POST['nome'];
    $celular = $_POST['celular'];
    $idEndereco = $_POST['idEndereco'];
    $dataPedido = $_POST['dataPedido'];
    $totalProdutos = $_POST['totalProdutos'];
    $totalPreco = $_POST['totalPreco'];


    if (isset($idEndereco)) {
      $dataPedido = date("Y-m-d H:i:s");
      $status = "Em preparo";
      //$totalProdutos = count($resultado_pedido);
      $totalPreco = $total;
      $idEndereco2 = $_POST['idEndereco'];
      $sql = "INSERT INTO pedidos (idUsuario, nome, celular, idEndereco, totalProdutos, totalPreco, dataPedido, status) VALUES ('$idUsuario','$nome','$celular', '$idEndereco2', '$totalProdutos', '$totalPreco', '$dataPedido', '$status')";

      // Executa a query
      // Depois de inserir o pedido com sucesso
      if (mysqli_query($conexao, $sql)) {
        // Obtém o idPedido do último pedido inserido
        $idPedido = mysqli_insert_id($conexao);
        echo "<script>alert('Pedido inserido com sucesso!');</script>";
        $sql = "DELETE FROM carrinho where idUsuario = $idUsuario";
        mysqli_query($conexao, $sql);
        // Redireciona para a página de pagamento com o idPedido como parâmetro GET
        header('location: pagamento.php?idPedidos=' . $idPedido);
      }
    } else {
      echo "ID do endereço não recebido!";
    }
  }
}
