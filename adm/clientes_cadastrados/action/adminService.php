<!-- preenchimento da tabela no backend pelo php -->
<?php
// Incluir conexão com o BD
include_once "../../conexao.php";

// Verificando se a conexão foi bem-sucedida
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$sql = "SELECT id, nome, dataNascimento, sexo, email, celular, situacao FROM usuario WHERE id_acesso = 3 AND situacao = 'ativo';";
$registros = mysqli_query($conexao, $sql);

// heredoc string para renderizar linhas na tabela HTML
function rows_table($id, $nome, $data_nasc, $sexo, $email, $tel_cel, $status)
{
    return  <<< row
                <tr id="$id">
                    <td class="text-nowrap nome">$nome</td>
                    <td>$data_nasc</td>
                    <td>$sexo</td>
                    <td class="text-nowrap">$email</td>
                    <td class="text-nowrap">$tel_cel</td>
                    <td>$status</td>
                    <td>
                        <span class="btnExcluir lista_admin_fale_conosco_botao ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </span>
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
            echo rows_table($linha["id"], $linha["nome"], $linha["dataNascimento"], $linha["sexo"], $linha["email"], $linha["celular"], $linha["situacao"]);
        }
    } else {
        echo "Erro na atualização do registro: " . mysqli_error($conexao);
    }
};

// Fechamento da conexão
mysqli_close($conexao);
?>