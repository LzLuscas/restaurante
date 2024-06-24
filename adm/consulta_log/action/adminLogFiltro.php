<!-- preenchimento FRILTRADO da tabela -- FUNCIONANDO -->
<?php
// Incluir conexão com o BD
include_once "../../../conexao.php";

// Verificando se a conexão foi bem-sucedida
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}
$substring = $_GET['search'];
$sql = "SELECT usuario.nome, log.datahora, log.codigo_autenticacao
        FROM log
        INNER JOIN usuario
        ON log.idUsuario = usuario.id
        WHERE usuario.CPF LIKE '$substring%'";
$registros = mysqli_query($conexao, $sql);

// heredoc string para renderizar linhas na tabela HTML
function rows_table($nome_user, $data_acesso, $cod_aut)
{
    return  <<< row
                <tr>
                    <td class="text-nowrap">$nome_user</td>
                    <td>$data_acesso</td>
                    <td>$cod_aut</td>                             
                </tr>
            row;
}

function response($registros, $conexao, $substring) {
// Resposta para request GET --> filtra os registros na tabela com base na subtring de filtro
    if ($registros) {
        // Iterar sobre os resultados
        while ($linha = mysqli_fetch_assoc($registros)) {
            echo rows_table($linha["nome"], $linha["datahora"], $linha["codigo_autenticacao"]);
        }

    } else {
        echo "Erro na atualização do registro: " . mysqli_error($conexao);
    }

}
echo response($registros, $conexao, $substring);

// Fechamento da conexão
mysqli_close($conexao);
?>