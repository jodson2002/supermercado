<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$sql = "SELECT COUNT(id_produto) AS count, SUM(preco) AS total FROM carrinho";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    $cartData = array(
        'count' => $row['count'],
        'total' => floatval($row['total'])
    );
    echo json_encode($cartData);
} else {
    
    $cartData = array(
        'count' => 0,
        'total' => 0.00
    );
    echo json_encode($cartData);
}

$conn->close();
?>
