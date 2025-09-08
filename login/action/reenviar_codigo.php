<?php
session_start();

// Usa as classes do PHPMailer com o namespace correto
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// 1. CORREÇÃO: Aponta para o local correto do autoload.php do Composer
require_once('../../vendor/autoload.php');
include_once "../../conexao.php";

// Verifica se as informações necessárias estão na sessão
if (!isset($_SESSION['id_temp']) || !isset($_SESSION['usuario_temp']) || !isset($_SESSION['email_temp']) || !isset($_SESSION['nome'])) {
    $mensagem = "Sua sessão expirou. Por favor, tente fazer o login novamente.";
    header("Location: login.php?mensagem=" . urlencode($mensagem));
    exit();
}

// Gera um novo código de autenticação seguro
$novo_codigo = random_int(100000, 999999);

// 2. CORREÇÃO DE SEGURANÇA: Usa prepared statements para o UPDATE
$query_update_codigo = "UPDATE usuario SET codigo_autenticacao = ?, data_codigo_autenticacao = NOW() WHERE id = ?";
$stmt_update_codigo = $conexao->prepare($query_update_codigo);
$stmt_update_codigo->bind_param("si", $novo_codigo, $_SESSION['id_temp']);
$stmt_update_codigo->execute();

// Se a atualização falhou, redireciona com erro
if ($stmt_update_codigo->affected_rows === 0) {
    $mensagem = "Erro ao gerar um novo código. Tente fazer login novamente.";
    header('Location: login.php?mensagem=' . urlencode($mensagem));
    exit();
}

$mail = new PHPMailer(true);

try {
    // Configurações do servidor de e-mail (Mailtrap)
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    
    // 3. CORREÇÃO: Usando as credenciais do Mailtrap mais recentes que você forneceu
    $mail->Username = '7c334afca23f83';
    $mail->Password = 'ed8d542eea422d';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 2525;

    // Remetente e Destinatário
    $mail->setFrom('nao-responda@saborbomsucesso.com', 'Sabor Bom Sucesso');
    $mail->addAddress($_SESSION['email_temp'], $_SESSION['nome']);

    // Conteúdo do E-mail
    $mail->isHTML(true);
    $mail->Subject = 'Seu novo código de verificação';
    $mail->Body    = "Olá " . htmlspecialchars($_SESSION['nome']) . ",<br><br>Seu novo código de verificação é: <strong>$novo_codigo</strong><br><br>Este código foi reenviado para verificar seu login.";
    $mail->AltBody = "Olá " . $_SESSION['nome'] . ",\n\nSeu novo código de verificação é: $novo_codigo\n\nEste código foi reenviado para verificar seu login.";

    $mail->send();

    $mensagem = "Um novo código foi enviado para o seu e-mail!";
    header('Location: validar_codigo.php?mensagem=' . urlencode($mensagem));
    exit();

} catch (Exception $e) {
    // Log do erro para depuração
    error_log("Erro ao reenviar código: " . $mail->ErrorInfo);
    $mensagem = "Erro: O e-mail não pôde ser enviado. Tente novamente mais tarde.";
    header('Location: validar_codigo.php?mensagem=' . urlencode($mensagem));
    exit();
}