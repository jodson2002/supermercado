<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";


$conexao = new mysqli($servername, $username, $password, $dbname);


if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}


$sql = "SELECT * FROM produtos";
$result = $conexao->query($sql);

if ($result === false) {
    echo "Erro na consulta: " . $conexao->error;
} 

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossos Produtos</title>
    <link rel="stylesheet" href="styles.css">
    <script src="teste.js"></script>
</head>
<body>
<section id="produtos">
    <h2>Nossos Produtos</h2>
    <?php
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo '<div class="produto">';
            echo '<img src="' . $row["imagem"] . '" alt="' . $row["nome"] . '">';
            echo '<h3>' . $row["nome"] . '</h3>';
            echo '<p>' . $row["descricao"] . '</p>';
            echo '<h4>Preço</h4>';
            echo '<a>' . number_format($row["preco"], 2, ',', '.') . ' R$</a>';
            echo '<br><br>';
            echo '<button data-product-id="<?php echo $row["id_produto"]; ?>" onclick="addToCart(this)">Adicionar ao Carrinho</button>';
            echo '</div>';
        }
    } else {
        echo "Nenhum produto encontrado.";
    }
    
    $result->free();

    $conexao->close();
    ?>
</section>
</body>
</html>
