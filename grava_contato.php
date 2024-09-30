<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $host = 'localhost';
        $db = 'senai_ta_aulaphp';
        $user = 'Jade Heinen';
        $pass = '25072006J@de';
        $port = 3307; // Porta MySQL correta
        // Inclui o arquivo da classe Database que criamos para conectar dentro da pasta php
        require_once 'connection.php';
        // Cria uma instância da classe Database
        $database = new Database($host, $db, $user, $pass, $port);
        // Chama o método connect para estabelecer a conexão
        $database->connect();
        // Obtém a instância PDO para realizar consultas
        $pdo = $database->getConnection();
    ?>
</head>
<body>
<?php
if (isset($_GET['nome']) && isset($_GET['email']) && isset($_GET['mensagem'])) {
$nome = htmlspacialchars($_GET['nome']);
$email = htmlspacialchars($_GET['email']); 
$mensagem = htmlspacialchars($_GET['mensagem']);    

echo "<h2>Informações Recebidas:</h2>";
echo "<p><strong>Nome:</strong> " . $nome . "</p>";
echo "<p><strong>E-mail:</strong> " . $email . "</p>";
echo "<p><strong>Mensagem:</strong> " . $mensagem . "</p>";

$stmt = $pdo->prepare("insert into senai_ta_aulaphp.mensagens(nome, email, mensagem values('$nome', '$email', '$mensagem');");

$stmt->execute();
} else {
    echo "Nenhum dado foi enviado.";
}
?>    