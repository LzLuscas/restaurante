<?php
// Defina ROOT_PATH se ainda não estiver definido
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__) . '/');
}

// Inclua a conexão com o banco de dados usando o caminho absoluto
include_once ROOT_PATH . 'conexao.php';

// Resto do código do carrinho.php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $idCardapio = $_POST['idCardapio'];
    $idUsuario = $_SESSION['id'];
    $action = $_POST['action'];

    if ($action == 'increase') {
        $query = "UPDATE carrinho SET quantidade = quantidade + 1 WHERE idUsuario = ? AND idCardapio = ?";
    } elseif ($action == 'decrease') {
        // Consulta para buscar a quantidade
        $query2 = "SELECT quantidade FROM carrinho WHERE idUsuario = ? AND idCardapio = ?";
        $stmt = $conexao->prepare($query2);
        $stmt->bind_param("ii", $idUsuario, $idCardapio);
        $stmt->execute();
        $result = $stmt->get_result();
        $row_busca = $result->fetch_assoc();

        if ($row_busca) {
            if ($row_busca['quantidade'] > 1) {
                // Se a quantidade for maior que 1, atualiza a quantidade
                $query = "UPDATE carrinho SET quantidade = quantidade - 1 WHERE idUsuario = ? AND idCardapio = ?";
            } else {
                // Se a quantidade for 1 ou menor, deleta o item do carrinho
                $query = "DELETE FROM carrinho WHERE idUsuario = ? AND idCardapio = ?";
            }
        }
    } elseif ($action == 'delete') {
        $query = "DELETE FROM carrinho WHERE idUsuario = ? AND idCardapio = ?";
    }

    $stmt = $conexao->prepare($query);
    $stmt->bind_param("ii", $idUsuario, $idCardapio);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Erro ao atualizar/remover o item do carrinho.";
    }

    $stmt->close();
}

$query = "SELECT SUM(c.quantidade * p.preco) AS total FROM carrinho c JOIN cardapio p ON c.idCardapio = p.id WHERE c.idUsuario = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($total);
$stmt->fetch();
$stmt->close();

// Exibir o total do carrinho
$totalFormatado = number_format($total, 2);

$query_cardapio2 = "
    SELECT c.idCardapio, p.nome, p.preco, p.imagem, c.quantidade
    FROM carrinho c 
    JOIN cardapio p ON c.idCardapio = p.id 
    WHERE c.idUsuario = '$_SESSION[id]'
";
$resultado_cardapio2 = mysqli_query($conexao, $query_cardapio2);
?>

<!-- carrinho lateral -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasCartLabel">Carrinho de Compras</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group" id="cart-items">
            <!-- Itens do carrinho serão adicionados aqui -->
        </ul>

        <!--Produto carrinho lateral-->
        <?php while ($row_cardapio2 = mysqli_fetch_assoc($resultado_cardapio2)) { ?>
            <div class="mt-3">
                <div class="cart-item" data-id="<?php echo $row_cardapio2['idCardapio']; ?>" data-price="<?php echo $row_cardapio2['preco']; ?>" data-name="<?php echo $row_cardapio2['nome']; ?>">
                    <div class="cart-item-info">
                        <img src="./adm/uploads/<?php echo $row_cardapio2['imagem']; ?>" alt="<?php echo $row_cardapio2['nome']; ?>" class="product-image">
                        <div>
                            <p class="nomeprodutocar"><?php echo $row_cardapio2['nome']; ?></p>
                            <p class="price-prod">Preço: $<?php echo number_format($row_cardapio2['preco'], 2); ?></p>
                        </div>
                    </div>
                    <div class="cart-item-actions">
                        <form method="POST">
                            <input type="hidden" name="idCardapio" value="<?php echo $row_cardapio2['idCardapio']; ?>">
                            <button type="submit" class="btn" name="action" value="decrease" id="qtdDimin">-</button>
                        </form>
                        <input type="text" class="form-control quantity" disabled value="<?php echo $row_cardapio2['quantidade']; ?>">
                        <form method="POST">
                            <input type="hidden" name="idCardapio" value="<?php echo $row_cardapio2['idCardapio']; ?>">
                            <button type="submit" class="btn" name="action" value="increase" id="qtdaumen">+</button>
                        </form>
                        <form method="POST">
                            <input type="hidden" name="idCardapio" value="<?php echo $row_cardapio2['idCardapio']; ?>">
                            <button type="submit" class="btn remove-item" name="action" id="btntrsah" value="delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg>
                            </button>
                        </form>
                        <button class="btn add-favorite m-0 p-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <p id="total-value" style="text-align: center; margin-top:50px; text-transform: uppercase;"><b>Total: R$ <span><?php echo $totalFormatado; ?></span></b></p>
        <div class="text-center my-4">
            <a class="btn btn-success" aria-controls="offcanvasCart" href="<?php echo $url?>/checkout.php">
                Comprar
            </a>
        </div>
    </div>
</div>

<script src="./carrinho.js" defer></script>
