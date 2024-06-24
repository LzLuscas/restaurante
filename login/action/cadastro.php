<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../../assets/lib/vendor/autoload.php');
require_once("../../conexao.php");

ob_start();

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
$chave = password_hash($email . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT); // Corrigindo aqui

$consultaCpf = "SELECT * FROM usuario WHERE cpf = '$cpf'";
$resultadoCpf = mysqli_query($conexao, $consultaCpf);

$consultaUsuario = "SELECT * FROM usuario WHERE usuario = '$usuario'";
$resultadoUsuario = mysqli_query($conexao, $consultaUsuario);

$consultaEmail = "SELECT * FROM usuario WHERE email = '$email'";
$resultadoEmail = mysqli_query($conexao, $consultaEmail);

$date = DateTime::createFromFormat('d/m/Y', $data);
$dataNascimentoFormatada = $date->format('Y-m-d');

if (mysqli_num_rows($resultadoCpf) > 0) {
    $mensagem = "CPF já cadastrado. Por favor, tente novamente.";
    header('Location: ../cadastrar.php?mensagem=' . urlencode($mensagem));
    exit();
}
if (mysqli_num_rows($resultadoEmail) > 0) {
    $mensagem = "Email já cadastrado. Por favor, tente novamente.";
    header('Location: ../cadastrar.php?mensagem=' . urlencode($mensagem));
    exit();
}
if (mysqli_num_rows($resultadoUsuario) > 0) {
    $mensagem = "Usuario já cadastrado. Por favor, tente novamente.";
    header('Location: ../cadastrar.php?mensagem=' . urlencode($mensagem));
    exit();
} else {
    function cadastro($conexao, $nome, $dataNascimentoFormatada, $genero, $mae, $cpf, $email, $telefone, $celular, $usuario, $senhaCriptografada, $chave, $cep, $rua, $numero, $complemento, $bairro, $cidade, $estado)
    {
        // cadastro usuario
        $query_cadastro_usuario = "INSERT INTO usuario (nome, dataNascimento, sexo, nomeMae, CPF, email, telefone, celular, usuario, senha_usuario, chave)
        VALUES ('$nome', '$dataNascimentoFormatada', '$genero', '$mae', '$cpf', '$email', '$telefone', '$celular', '$usuario', '$senhaCriptografada', '$chave')";

        $resultado_cadastro_usuario = mysqli_query($conexao, $query_cadastro_usuario);

        if ($resultado_cadastro_usuario) {
            // Obter o id do usuário recém-inserido
            $idUsuario = mysqli_insert_id($conexao);

            // cadastro endereço
            $query_cadastro_endereco = "INSERT INTO endereco (idUsuario, CEP, rua, numero, complemento, bairro, cidade, estado)
            VALUES ('$idUsuario', '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";

            $resultado_cadastro_endereco = mysqli_query($conexao, $query_cadastro_endereco);

            return $resultado_cadastro_endereco;
        } else {
            return false;
        }
    }

    if ((cadastro($conexao, $nome, $dataNascimentoFormatada, $genero, $mae, $cpf, $email, $telefone, $celular, $usuario, $senhaCriptografada, $chave, $cep, $rua, $numero, $complemento, $bairro, $cidade, $estado))) {
        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = 'utf-8';
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '176ef72849013f';
            $mail->Password = '36f9ae70e51616';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 2525;

            $mail->setFrom('from@example.com', 'Sabor Bom Sucesso');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Confirma o e-mail';
            $mail->Body = "Prezado(a) $nome,<br><br>Agradecemos a sua solicitação de cadastramento em nosso site!<br><br>
            Para que possamos liberar o seu cadastro em nosso sistema, solicitamos a confirmação do e-mail clicando no link abaixo: <br><br>
            <a href='http://localhost/restaurante/confirmar-email.php?chave=$chave'>Clique aqui</a><br><br>Esta mensagem foi enviada a você pelo Restaurante Sabor Bom Sucesso. <br>
            Você está recebendo porque está cadastrado no banco de dados do restaurante Sabor Bom Sucesso. Nenhum e-mail enviado pela empresa Sabor Bom Sucesso tem arquivos anexados
            ou solicita o preenchimento de senhas e informações cadastrais.<br><br>";
            $mail->AltBody = "Prezado(a) $nome,\n\nAgradecemos a sua solicitação de cadastramento em nosso site!\n\n
            Para que possamos liberar o seu cadastro em nosso sistema, solicitamos a confirmação do e-mail clicando no link abaixo: \n\n
            http://localhost/restaurante/confirmar-email.php?chave=$chave \n\nEsta mensagem foi enviada a você pelo Restaurante Sabor Bom Sucesso. \n
            Você está recebendo porque está cadastrado no banco de dados do restaurante Sabor Bom Sucesso. Nenhum e-mail enviado pela empresa Sabor Bom Sucesso tem arquivos anexados
            ou solicita o preenchimento de senhas e informações cadastrais.\n\n";

            $mail->send();
            $mensagem = "Usuário cadastrado com sucesso. Necessário acessar a caixa de e-mail para confirmar o e-mail!!";
            header('Location: ' . $url . '/login/login.php?mensagem=' . urlencode($mensagem));
        } catch (Exception $e) {
            echo "Ocorreu um erro ao cadastrar. Por favor, tente novamente.Error gerado {$mail->ErrorInfo}";
        }
    } else {
        echo "Ocorreu um erro ao cadastrar. Por favor, tente novamente.";
    }
}

ob_end_flush();
