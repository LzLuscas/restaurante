<?php

session_start(); // Iniciar sessão 

// Apaga todas as variáveis da sessão
$_SESSION = array();

ob_start(); // Limpar buffer de saída

// Importar classes Composer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('America/Sao_Paulo');
// Incluir conexão com o BD
include_once "../conexao.php";
require_once('../vendor/autoload.php');
// Imprimir os erros com debug

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
    // Receber dados do formulario
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


    if (!empty($dados['SendLogin'])) {
        // Recuperar dados do usuário no BD

        // Recuperar e filtrar os dados do formulário
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $senha_usuario = filter_input(INPUT_POST, 'senha_usuario', FILTER_SANITIZE_STRING);

        // Recuperar o e-mail do formulário
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


        // Consulta para recuperar os dados do usuário
        $query_usuario = "SELECT id, nome, usuario, email, senha_usuario, situacao
                      FROM usuario
                      WHERE usuario = '$usuario'
                      LIMIT 1";

        $result_usuario = mysqli_query($conexao, $query_usuario);

        if ($result_usuario && mysqli_num_rows($result_usuario) != 0) {
            $row_usuario = mysqli_fetch_assoc($result_usuario);

            // Verificar se a senha é válida
            if (password_verify($senha_usuario, $row_usuario['senha_usuario'])) {
                if ($row_usuario['situacao'] === 'ativo') {
                    // Salvar os dados do usuário na sessão
                    $_SESSION['id_temp'] = $row_usuario['id'];
                    $_SESSION['usuario_temp'] = $row_usuario['usuario'];
                    $_SESSION['email_temp'] = $row_usuario['email'];

                    // Gerar número randômico entre 100000 e 999999
                    $codigo_autenticacao = mt_rand(100000, 999999);

                    // Query para atualizar código e data gerada no BD
                    $query_up_usuario = "UPDATE usuario SET
                                    codigo_autenticacao = '$codigo_autenticacao',
                                    data_codigo_autenticacao = NOW()
                                    WHERE id = '{$row_usuario['id']}'
                                    LIMIT 1";

                    $result_up_usuario = mysqli_query($conexao, $query_up_usuario);

                    if ($result_up_usuario) {
                        // Criar objeto e instanciar a classe do PHPMailer
                        $mail = new PHPMailer(true);

                        // Configurações do PHPMailer
                        // ...

                        // Tente enviar o e-mail
                        try {
                            // Configurações do PHPMailer
                            // $mail->SMTPDebug  = SMTP::DEBUG_SERVER; // Definir para usar SMTP
                            $mail->CharSet = 'utf-8';
                            $mail->isSMTP();
                            $mail->Host = 'sandbox.smtp.mailtrap.io';
                            $mail->SMTPAuth = true;
                            $mail->Username = '176ef72849013f';
                            $mail->Password = '36f9ae70e51616';
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                            $mail->Port = 2525;
                            $mail->setFrom('from@example.com', 'Sabor Bom Sucesso'); // Email do remetente
                            $mail->addAddress($row_usuario['email']); // Email de destino
                            $mail->isHTML(true); // Definir formatto de email para HTML
                            $mail->Subject    = 'Aqui está o código de verificação de 8 dígitos solicitado.'; //Título do email
                            $mail->Body       = "Olá " . $row_usuario['nome'] . ", Seu código de verificação de 8 dígitos é $codigo_autenticacao<br><br> 
                    Esse código foi enviado para verificar seu login.<br><br>"; // Conteudo do email em formato HTML
                            $mail->AltBody    = "Olá" . $row_usuario['nome'] . ", Autenticação multifator.\n\nSeu código de verificação de 8 dígitos é $codigo_autenticacao\n\n
                    Esse código foi enviado para verificar seu login."; // Conteudo do email em formato texto
                            $mail->send(); // Enviar email
                            // Redirecionar usuário
                            $mensagem = "Verifique seu e-mail e coloque o codigo para logar";
                            header('Location: action/validar_codigo.php?mensagem=' . urlencode($mensagem));
                            exit();
                        } catch (Exception $e) {
                            $mensagem = "Erro: E-mail enviado sem sucesso!";
                            header('Location: login.php?mensagem=' . urlencode($mensagem));
                        }
                    } else {
                        $mensagem =  "Erro ao atualizar código de autenticação.";
                        header('Location: login.php?mensagem=' . urlencode($mensagem));
                    }
                } else {
                    $mensagem =  "Você precisa confirmar a sua inscrição no seu e-mail.";
                    
                    header('Location: login.php?mensagem=' . urlencode($mensagem));
                }
            } else {
                $mensagem =  "Erro: Senha inválida!";
                header('Location: login.php?mensagem=' . urlencode($mensagem));
            }
        } else {
            $mensagem =  "Erro: Usuário não encontrado";
            header('Location: login.php?mensagem=' . urlencode($mensagem));
        }
    }
    ?>

    <main class="d-flex align-items-center justify-content-center main">
        <div class="form-container" id="form-container">
            <form method="POST" id="multi-step-form">
                <div id="step1">
                    <div class="info-step-1">
                        <p class="p-12">Login</p>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <input type="text" class="input" name="usuario" placeholder="Usuário" required>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                        </svg>
                        <input class="input" type="password" name="senha_usuario" placeholder="Digite sua senha" required>
                    </div>

                    <input type="submit" name="SendLogin" value="Acessar" class="next input" onclick="nextStep()">

                </div>
                <div class="burro">
                    <a href="cadastrar.php" class="meu-cadastro" style="color: #d2b48c !important;"> Cadastre-se</a>

                    <a href="#" class="esqueceu-senha" style="color: #d2b48c !important;">Esqueceu a senha?</a>
                </div>
            </form>


        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="../assets/js/cadastro.js"></script>

</body>

</html>