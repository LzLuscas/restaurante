<?php
    // Iniciar a sessão se não estiver iniciada
    session_start();

    // Limpar todas as variáveis de sessão
    $_SESSION = array();
    
    // Destruir a sessão
    session_destroy();

    $index = "http://localhost/restaurante/index.php";

    // Redirecionar para a página de login ou outra página apropriada
    header("Location: $index");
    exit;
?>
