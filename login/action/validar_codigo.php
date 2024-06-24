<?php
    
    session_start(); // Iniciar sessão 

    ob_start(); // Limpar buffer de saída

    date_default_timezone_set('America/Sao_Paulo');
    // Incluir conexão com o BD
    include_once "../../conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Document</title>
</head>
<script>
    window.onload = function() {
        // Verificar se a mensagem está presente na URL
        var mensagem = "<?php echo isset($_GET['mensagem']) ? $_GET['mensagem'] : ''; ?>";
        if (mensagem) {
            alert(mensagem);
        }
    }
</script>
<body class="body">
<?php
// Receber dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados['ValCodigo'])) {
    $codigo = $dados['codigo_autenticacao'];
    // Recuperar dados do usuário no BD
    $query_usuario = "SELECT id, nome, usuario, email, id_acesso, senha_usuario
                  FROM usuario
                  WHERE id = ?
                  AND usuario = ?
                  AND codigo_autenticacao = ?
                  LIMIT 1";


    // Preparar a query
    $result_usuario = mysqli_prepare($conexao, $query_usuario);

    // Substituir os parâmetros da query pelos valores vindos do formulário
    mysqli_stmt_bind_param($result_usuario, 'iss', $_SESSION['id_temp'], $_SESSION['usuario_temp'], $codigo);

    // Executar a query
    mysqli_stmt_execute($result_usuario);

    // Verificar se a query retornou resultados
    mysqli_stmt_store_result($result_usuario);

    // Acessar o IF quando encontrar o usuário no BD
    if (mysqli_stmt_num_rows($result_usuario) != 0) {
        // Associar os resultados da query a variáveis
        mysqli_stmt_bind_result($result_usuario, $id, $nome, $usuario, $email, $id_aces, $senha_usuario);

        // Buscar os resultados
        mysqli_stmt_fetch($result_usuario);

        // Query para atualizar o código e a data gerada no BD
        $query_up_usuario = "UPDATE usuario SET
                             codigo_autenticacao=NULL,
                             data_codigo_autenticacao=NULL
                             WHERE id = ? 
                             LIMIT 1";

        // Preparar a query
        $result_up_usuario = mysqli_prepare($conexao, $query_up_usuario);

        // Substituir os parâmetros da query pelos valores
        mysqli_stmt_bind_param($result_up_usuario, 'i', $_SESSION['id_temp']);

        // Executar a query
        mysqli_stmt_execute($result_up_usuario);

        // Limpar dados temporários de sessão para login e autenticação
        $_SESSION = array();

        // Salvar os dados do usuário na sessão real
        $_SESSION['id'] = $id;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['id_acesso'] = $id_aces;
        $_SESSION['codigo_autenticacao'] = true;

        // Enviar registro do loogin para a tabela de Logs de acesso
        $query_log = "INSERT INTO log (idUsuario, datahora, codigo_autenticacao)
        VALUES ('$id', NOW(), '$codigo');";
        // Executando query_log
        mysqli_query($conexao, $query_log);


        // Atualizando ultimo acesso do usuario
        $query_ultimo_acesso = "UPDATE usuario SET ultimo_acesso = NOW() WHERE id = $id";
        // Executando query_ultimo_acesso
        mysqli_query($conexao, $query_ultimo_acesso);

        
        // Redirecionar o usuário
        header('Location: '.$url.'/index.php');

        exit();
    } else {
        $mensagem = "Erro: Código inválido!";
        header('Location: validar_codigo.php?mensagem=' . urlencode($mensagem));
        exit();
    }
}
?>

<main class="d-flex align-items-center justify-content-center">
        <div class="form-container" id="form-container">
            <form method="POST" action="" id="multi-step-form">
                <div id="step1">
                    <div class="info-step-1">
                        <p class="p-1" style="color: #d2b48c !important;">Código de verificação.</p>
                    </div>
                    <div class="input-box"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                        </svg>
                        <input type="text" class="input" name="codigo_autenticacao" placeholder="Digite o código:" required>
                    </div>

                    <input type="submit"  name= "ValCodigo" value= "Validar" class="next input" onclick="nextStep()">  

                </div>
                <a href="reenviar_codigo.php" class="esqueceu-senha validarcod" style="color: #d2b48c !important;">Reenviar código?</a>

            </form>
        </div>

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="index.js"></script>

</body>
</html>