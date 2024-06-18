<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Receber os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Consultar o banco de dados para verificar o login
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
$stmt->bind_param("ss", $email, $senha);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Login válido, redirecionar para a site externo
    $_SESSION['logged_in'] = true; // Definir uma sessão indicando que o usuário está logado
    
    // Armazenar o email na sessão
    $_SESSION['email'] = $email;

    header("Location: teste.php");
    exit();
} else {
    // Login inválido
    echo "Usuário não registrado. Redirecionando para a página de login...";
    header("refresh:5;url=login.php"); // Redirecionar de volta para a tela de login após 5 segundos
}

$stmt->close();
$conn->close();
?>
