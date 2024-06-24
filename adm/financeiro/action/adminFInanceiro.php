<!-- preenchimento da tabela no backend pelo php -->
<?php
// Incluir conexão com o BD
include_once "../../conexao.php";

// Verificando se a conexão foi bem-sucedida
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$sql = "SELECT nome, dataPagamento, formaPagamento, situacao, valor FROM financeiro";

$registros = mysqli_query($conexao, $sql);


// heredoc string para renderizar linhas na tabela HTML
function rows_table($nome_user, $data_pg, $forma_pg, $status_pg, $valor_pg)
{
    return  <<< row
                <tr>
                    <td class="text-nowrap">$nome_user</td>
                    <td>$data_pg</td>
                    <td>$forma_pg</td>
                    <td>$status_pg</td>
                    <td class="valor">$valor_pg</td>
                    <td>
                        <a href="#" class="lista_admin_fale_conosco_botao ms-3">
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
            
            echo rows_table($linha["nome"], $linha["dataPagamento"], $linha["formaPagamento"], $linha["situacao"], $linha["valor"]);
            
        }
    } else {
        echo "Erro na atualização do registro: " . mysqli_error($conexao);
    }
};

// Fechamento da conexão
mysqli_close($conexao);
?>