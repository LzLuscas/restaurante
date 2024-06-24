<?php
session_start();

// Incluir o arquivo de conexão com o BD
include_once "../../conexao.php";

// Verificar se o usuário está logado
if (!isset($_SESSION['id_temp']) || !isset($_SESSION['usuario_temp'])) {
    $_SESSION['msg'] = "<p style='color: red;'>Erro: Tente efetuar o login novamente para reenviar o código!</p>";
    header("Location: index.php");
    exit();
}

// Gera novo código de autenticação
$novo_codigo = mt_rand(100000, 999999);

// Atualiza o banco de dados com o novo código
$query_update_codigo = "UPDATE usuario SET codigo_autenticacao = ? WHERE id = ?";
$stmt_update_codigo = mysqli_prepare($conexao, $query_update_codigo);
mysqli_stmt_bind_param($stmt_update_codigo, 'ii', $novo_codigo, $_SESSION['id_temp']);
mysqli_stmt_execute($stmt_update_codigo);

// Envio de email com novo código
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

try {
    require '../../assets/lib/vendor/autoload.php';

    // Cria o objeto e instanciar a classe do phpmailer
    $mail = new PHPMailer(true);

    // Config do servidor de email
    $mail->CharSet = 'utf-8';
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username = '176ef72849013f';
    $mail->Password = '36f9ae70e51616';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 2525;

    $mail->setFrom('from@example.com', 'Sabor Bom Sucesso');
    $mail->addAddress($_SESSION['email_temp'], $_SESSION['nome']);

    // Conteudo do email
    $mail->isHTML(true);
    $mail->Subject    = 'Reenvio de código de verificação';
    $mail->Body       = "Olá" . $_SESSION['nome'] . ",\n\nseu novo código de verificação é: $novo_codigo\n\n<br><br>Este código foi reenviado para verificar seu login.";

    // Envia email
    $mail->send();

    $mensagem = "Novo código enviado com sucesso!";
    header('Location: validar_codigo.php?mensagem=' . urlencode($mensagem));
    exit();
} catch (Exception $e) {
    $mensagem = "Erro ao enviar e-mail: {$mail->ErrorInfo}";
    header('Location: validar_codigo.php?mensagem=' . urlencode($mensagem));
    exit();
}
