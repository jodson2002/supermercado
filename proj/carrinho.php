<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrinho de Compras</title>
</head>
<body>
    <h2>Carrinho de Compras</h2>
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId => $quantity) {
            echo "Produto ID: " . $productId . " - Quantidade: " . $quantity . "<br>";
        }
    } else {
        echo "Seu carrinho está vazio.";
    }
    ?>
</body>
</html>