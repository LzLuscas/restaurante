<?php

// Usa as classes do PHPMailer com o namespace correto
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Inicia o buffer de saída para evitar erros de "headers already sent"
ob_start();

// 1. CORREÇÃO: Aponta para o local correto do autoload.php do Composer
require_once('../../vendor/autoload.php');
require_once("../../conexao.php");

// Pega os dados do formulário
$nome = $_POST['nome'];
$data = $_POST['data'];
$genero = $_POST['genero'];
$mae = $_POST['nomeMae'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['uf'];
$usuario = $_POST['loginre'];
$senha = $_POST['password'];

// Cria a chave de confirmação e criptografa a senha
$chave = password_hash($email . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

// Formata a data de nascimento para o formato do banco de dados (Y-m-d)
$date = DateTime::createFromFormat('d/m/Y', $data);
$dataNascimentoFormatada = $date->format('Y-m-d');


// --- VERIFICAÇÕES SEGURAS COM PREPARED STATEMENTS ---

// 2. CORREÇÃO DE SEGURANÇA: Usa prepared statements para evitar SQL Injection
// Verifica se o CPF já existe
$stmt = $conexao->prepare("SELECT id FROM usuario WHERE cpf = ?");
$stmt->bind_param("s", $cpf); // "s" significa que a variável é uma string
$stmt->execute();
$resultadoCpf = $stmt->get_result();

if ($resultadoCpf->num_rows > 0) {
    $mensagem = "CPF já cadastrado. Por favor, tente novamente.";
    header('Location: ../cadastrar.php?mensagem=' . urlencode($mensagem));
    exit();
}

// Verifica se o Email já existe
$stmt = $conexao->prepare("SELECT id FROM usuario WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultadoEmail = $stmt->get_result();

if ($resultadoEmail->num_rows > 0) {
    $mensagem = "Email já cadastrado. Por favor, tente novamente.";
    header('Location: ../cadastrar.php?mensagem=' . urlencode($mensagem));
    exit();
}

// Verifica se o Usuário já existe
$stmt = $conexao->prepare("SELECT id FROM usuario WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultadoUsuario = $stmt->get_result();

if ($resultadoUsuario->num_rows > 0) {
    $mensagem = "Usuário já cadastrado. Por favor, tente novamente.";
    header('Location: ../cadastrar.php?mensagem=' . urlencode($mensagem));
    exit();
}

// --- FUNÇÃO DE CADASTRO SEGURA ---

function cadastro($conexao, $nome, $dataNascimentoFormatada, $genero, $mae, $cpf, $email, $telefone, $celular, $usuario, $senhaCriptografada, $chave, $cep, $rua, $numero, $complemento, $bairro, $cidade, $estado)
{
    // 2. CORREÇÃO DE SEGURANÇA: Usa prepared statements para o INSERT do usuário
    $query_usuario = "INSERT INTO usuario (nome, dataNascimento, sexo, nomeMae, CPF, email, telefone, celular, usuario, senha_usuario, chave) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_usuario = $conexao->prepare($query_usuario);
    // s = string. A ordem deve ser a mesma da query.
    $stmt_usuario->bind_param("sssssssssss", $nome, $dataNascimentoFormatada, $genero, $mae, $cpf, $email, $telefone, $celular, $usuario, $senhaCriptografada, $chave);
    
    if ($stmt_usuario->execute()) {
        // Obter o id do usuário recém-inserido
        $idUsuario = $conexao->insert_id;

        // 2. CORREÇÃO DE SEGURANÇA: Usa prepared statements para o INSERT do endereço
        $query_endereco = "INSERT INTO endereco (idUsuario, CEP, rua, numero, complemento, bairro, cidade, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_endereco = $conexao->prepare($query_endereco);
        // i = integer, s = string.
        $stmt_endereco->bind_param("isssssss", $idUsuario, $cep, $rua, $numero, $complemento, $bairro, $cidade, $estado);
        
        return $stmt_endereco->execute(); // Retorna true se o cadastro de endereço funcionou
    } else {
        return false;
    }
}

// --- EXECUÇÃO DO CADASTRO E ENVIO DE E-MAIL ---

if (cadastro($conexao, $nome, $dataNascimentoFormatada, $genero, $mae, $cpf, $email, $telefone, $celular, $usuario, $senhaCriptografada, $chave, $cep, $rua, $numero, $complemento, $bairro, $cidade, $estado)) {
    
    $mail = new PHPMailer(true);
    try {
        // Configurações do servidor de e-mail (Mailtrap)   
        $mail->CharSet = 'utf-8';
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '7c334afca23f83'; // Substitua pelo seu usuário do Mailtrap
        $mail->Password = 'ed8d542eea422d'; // Substitua pela sua senha do Mailtrap
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;

        // Remetente e Destinatário
        $mail->setFrom('nao-responda@saborbomsucesso.com', 'Sabor Bom Sucesso');
        $mail->addAddress($email, $nome);

        // Conteúdo do E-mail
        $mail->isHTML(true);
        $mail->Subject = 'Confirme seu e-mail de cadastro';

        // 3. CORREÇÃO DO LINK: Usa a variável $url para o link de confirmação
        $link_confirmacao = "{$url}/confirmar-email.php?chave={$chave}";
        
        $mail->Body = "Prezado(a) {$nome},<br><br>Agradecemos o seu cadastro em nosso site!<br><br>
                       Para ativar sua conta, por favor, confirme seu e-mail clicando no link abaixo: <br><br>
                       <a href='{$link_confirmacao}'>Clique aqui para confirmar seu e-mail</a><br><br>
                       Atenciosamente,<br>Equipe Sabor Bom Sucesso.";
        
        $mail->AltBody = "Prezado(a) {$nome},\n\nAgradecemos o seu cadastro em nosso site!\n\n
                        Para ativar sua conta, por favor, confirme seu e-mail copiando e colando o seguinte link no seu navegador: \n\n
                        {$link_confirmacao}\n\n
                        Atenciosamente,\nEquipe Sabor Bom Sucesso.";

        $mail->send();
        
        $mensagem = "Usuário cadastrado com sucesso. Acesse sua caixa de e-mail para confirmar a conta!";
        header('Location: ' . $url . '/login/login.php?mensagem=' . urlencode($mensagem));

    } catch (Exception $e) {
        // Se o e-mail falhar, ainda informa o usuário, mas loga o erro para o desenvolvedor
        error_log("Erro ao enviar e-mail de confirmação: " . $mail->ErrorInfo);
        $mensagem = "Usuário cadastrado, mas houve um erro ao enviar o e-mail de confirmação. Por favor, entre em contato com o suporte.";
        header('Location: ' . $url . '/login/login.php?mensagem=' . urlencode($mensagem));
    }
} else {
    $mensagem = "Ocorreu um erro ao cadastrar seus dados. Por favor, tente novamente.";
    header('Location: ../cadastrar.php?mensagem=' . urlencode($mensagem));
}

// Limpa o buffer e envia a saída
ob_end_flush();
?>