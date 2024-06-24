<!-- preenchimento da tabela no backend pelo php -->
<?php
// Incluir conexão com o BD
include_once "../../conexao.php";

// Verificando se a conexão foi bem-sucedida
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$sql = "SELECT usuario.nome, log.datahora, log.codigo_autenticacao
        FROM log
        INNER JOIN usuario
        ON log.idUsuario = usuario.id";

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

// Verificar se a consulta foi bem sucedida
function response($registros, $conexao)
{
    if ($registros) {
        // Iterar sobre os resultados
        while ($linha = mysqli_fetch_assoc($registros)) {
            // Acessar os valores de cada coluna pelo nome da coluna
            
            echo rows_table($linha["nome"], $linha["datahora"], $linha["codigo_autenticacao"]);
            
        }
    } else {
        echo "Erro na atualização do registro: " . mysqli_error($conexao);
    }
};

// Fechamento da conexão
mysqli_close($conexao);
?>