<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber o ID do produto
$id_produto = $_POST['id_produto'];

// Preparar e executar a consulta SQL para inserir o produto no carrinho
$sql = "INSERT INTO carrinho (id_produto) VALUES ('$id_produto')";

if ($conn->query($sql) === TRUE) {
    echo "Produto adicionado ao carrinho com sucesso!";
} else {
    echo "Erro ao adicionar produto ao carrinho: " . $conn->error;
}

$conn->close();
?>

