<?php
$host = 'localhost';
$user = 'seu_usuario';
$password = 'sua_senha';
$database = 'db_php';

$conn = new mysqli($host, $user, $password, $database);

// Testar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
 