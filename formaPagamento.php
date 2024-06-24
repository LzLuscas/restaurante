<?php
include_once('./conexao.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['idPedidos'])) {
    $idPedidos = $_GET['idPedidos'];
    
}
$id_user_checkout = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['formaPagamento'])) {
        $formaPagamento = $_POST['formaPagamento'];


        $sql = "UPDATE pedidos SET formaPagamento = ? WHERE idUsuario = $id_user_checkout AND idPedidos = $idPedidos";

        

        $stmt = $conexao->prepare($sql);


        if ($stmt) {

            $stmt->bind_param("s", $formaPagamento);


            if ($stmt->execute()) {
                $_SESSION['message'] = "Pedido em preparo";
                header('location: status.php');
                exit();
            } else {
                echo "Erro ao executar a consulta: " . $stmt->error;
            }


            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $conexao->error;
        }
    } else {
        echo "Nenhum método de pagamento selecionado.";
    }
}
$conexao->close();
?>
<script>
    console.log(<?php echo $idPedidos;?>);
</script>