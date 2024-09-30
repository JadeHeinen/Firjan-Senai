<?php
include 'connection.php';

// Processar a inserção de dados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    $stmt = $conn->prepare("INSERT INTO alunos (nome, idade, email, curso) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $nome, $idade, $email, $curso);

    if ($stmt->execute()) {
        header("Location: index.html");
        exit();
    } else {
        echo "Erro: " . $stmt->error;
    }
}

// Listar alunos
$result = $conn->query("SELECT * FROM alunos");
$alunos = $result->fetch_all(MYSQLI_ASSOC);
?>