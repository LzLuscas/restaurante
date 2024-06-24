<?php
// Incluir conexão com o BD
include_once "conexao.php";

// Obter dados do formulário
$nome = $_POST['name'];
$sobrenome = $_POST['Sobrenome'];
$email = $_POST['email'];
$telefone = $_POST['tel'];
$mensagem = $_POST['mens'];

// Preparar e bind
$stmt = $conexao->prepare("INSERT INTO mensagens (nome_cliente, sobrenome, email, telefone, conteudo_mensagem, status, data_criacao, data_atualizacao) VALUES (?, ?, ?, ?, ?, 'pendente', NOW(), NOW())");
$stmt->bind_param("sssss", $nome, $sobrenome, $email, $telefone, $mensagem);




// Executar a declaração
if ($stmt->execute()) {
    echo "<p>Nova mensagem enviada com sucesso!</p>";
    echo "<p>Redirecionando em <span id='counter'>3</span> segundos...</p>";
    echo "<script>
        var counter = 3;
        setInterval(function() {
            counter--;
            if (counter >= 0) {
                document.getElementById('counter').innerHTML = counter;
            }
            if (counter === 0) {
                window.location.href = 'index.php';
            }
        }, 1000);
    </script>";
} else {
    echo "Erro: " . $stmt->error;
}




// Fechar conexões
$stmt->close();
$conexao->close();
?>