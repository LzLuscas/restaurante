<?php

// Chave de criptografia
// $chave = 'chave_de_criptografia';

// URL original
$url = 'http://localhost/restaurante';

// Criptografar a URL
// $urlCriptografada = base64_encode(openssl_encrypt($url, 'AES-256-CBC', $chave, 0, substr($chave, 0, 16)));

// // Definir a URL criptografada como constante
// define('URL_CRIPTOGRAFADA', $urlCriptografada);



$servidor = 'localhost';
$usuario = 'root';
$senha = 'baraujobaa';
$banco = 'restaurante';

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if (mysqli_connect_errno()) {
    trigger_error(mysqli_connect_error());
};
