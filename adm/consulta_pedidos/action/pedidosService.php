<!-- preenchimento da tabela no backend pelo php -->
<?php
// Incluir conexão com o BD
include_once "../../conexao.php";

// Verificando se a conexão foi bem-sucedida
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$sql = "SELECT idPedidos, idEndereco, nome, totalProdutos, dataPedido, totalPreco, status FROM pedidos";
$registros = mysqli_query($conexao, $sql);

// heredoc string para renderizar linhas na tabela HTML
function rows_table($id, $id_end, $nome,$qtd_itens,$data_pedido, $total, $status)
{
    return  <<< row
                <tr>
                    <td>$id</td>
                        <td>$nome</td>
                        <td>
                            <span id = "$id_end" class="lista_admin_fale_conosco_botao m-1 btnEndereco" data-bs-toggle="modal" data-bs-target="#endereco_pedido">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8z"/>
                                    <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                                </svg>
                            </span>
                        </td>
                            <td>$qtd_itens</td>
                            <td>$data_pedido</td>
                            <td>$total</td>
                            <td>$status</td>
                            <td>
                                <a href="#" class="lista_admin_fale_conosco_botao m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg>
                                </a>
                            </td>
                </tr>
            row;
}

// Verificar se a consulta foi bem sucedida
function response($registros, $conexao)
{
    if ($registros) {
        // Iterar sobre os resultados
        while ($linha = mysqli_fetch_assoc($registros)) {
            // Acessar os valores de cada coluna pelo nome da coluna
            echo rows_table($linha["idPedidos"], $linha["idEndereco"], $linha["nome"], $linha["totalProdutos"], $linha["dataPedido"], $linha["totalPreco"], $linha["status"]);
        }
    } else {
        echo "Erro na atualização do registro: " . mysqli_error($conexao);
    }
};

// Fechamento da conexão
mysqli_close($conexao);
?>