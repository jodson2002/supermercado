<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php"); // Redirecionar para a página de login se não estiver logado
    exit();
}

// Verificar se o email está definido na sessão
if (!isset($_SESSION['email'])) {
    echo "Erro: Email não encontrado na sessão.";
    header("refresh:5;url=login.php");
    exit();
}

// Exibir mensagem de boas-vindas
$email = $_SESSION['email'];
echo "Bem-vindo, $email!";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado Online</title>
    <link rel="stylesheet" href="teste.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
</head>

<body>
    <header>
        <h1>Supermercado Online</h1>
        <nav>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="formulario.php">Cadastro</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <section class="slider">
            <div class="slider-content">
        
                <input type="radio" name="btn-radio" id="radio1">
                <input type="radio" name="btn-radio" id="radio2">
                <input type="radio" name="btn-radio" id="radio3">      
        
                <div class="nav-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                </div>
        
                <div class="nav-manual">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                </div>
        
        
            </div>
        </section>

        <section id="produtos">
            <h2>Nossos Produtos</h2>
        <div class="produto">
            <img src="Imagens/cereal.jpeg" alt="CEREAL">
            <h3>Cereal</h3>
            <p></p>
            <h4>Preço</h4>
            <span class="preco">5,00 R$</span>
            <br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="1">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="data:image/jpeg;base64,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"
                alt="Produto 3">
            <h3>Agua Mineral</h3>
            <p>Descrição do Produto 3. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <h4>Preço</h4>
            <a>5,00 R$</a>
            <br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="2">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUYwrCeF3IYj5RF3BKFsmO-cbdrB0B2Epu5Q&s"
                alt="Produto 4">
            <h3>Sabão em pó</h3>
            <p>Descrição do Produto 4. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <h4>Preço</h4>
            <a>5,00 R$</a>
            <br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="3">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRs1Ijl-9ZNoK690tr1vQIs3lQoFFcC0lhx_A&s"
                alt="Produto 5">
            <h3>cif Cozinha</h3>
            <p>Descrição do Produto 5. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <h4>Preço</h4>
            <a>5,00 R$</a>
            <br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="4">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <!-- carnes -->
        <div class="produto">
            <img src="https://img.freepik.com/fotos-premium/carne-bovina-crua-isolada-no-fundo-branco_319514-5410.jpg"
                alt="Carne de Boi">
            <h3>Carne de Boi</h3>
            <p>Descrição da carne de boi. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <h4>Preço</h4>
            <a>20,00 R$</a><br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="5">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="https://thumbs.dreamstime.com/b/carne-carne-de-porco-corta-o-lombo-de-carne-de-porco-em-um-fundo-branco-93612201.jpg"
                alt="Carne de Porco">
                <h3>Carne de Porco</h3>
                <p>Descrição da carne de porco. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <h4>Preço</h4>
                <span class="preco">18,00 R$</span><br><br>
                <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="6">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="https://img.freepik.com/fotos-premium/carne-de-frango-em-fundo-branco_181303-5814.jpg" alt="Frango">
            <h3>Peito de Frango</h3>
            <p>Descrição do frango. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <h4>Preço</h4>
            <a>15,00 R$</a><br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="7">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="https://png.pngtree.com/background/20231012/original/pngtree-fresh-sausage-delicatessen-meat-sausage-white-background-photo-picture-image_5473865.jpg"
                alt="Linguiça">
            <h3>Linguiça</h3>
            <p>Descrição da linguiça. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <h4>Preço</h4>
            <a>12,00 R$</a> <br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="8">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="https://png.pngtree.com/png-vector/20210912/ourlarge/pngtree-cut-pork-ribs-png-image_3920420.png"
                alt="Costela de Porco">
            <h3>Costela de Porco</h3>
            <p>Descrição da costela de porco. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <h4>Preço</h4>
            <a>25,00 R$</a><br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="9">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF5Qk-JGlK9w6Ag_YD7yxCcnRkFC2pqYRn7Q&s"
                alt="Picanha">
            <h3>Picanha</h3>
            <p>Descrição da picanha. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <h4>Preço</h4>
            <a>30,00 R$</a> <br>
            <br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="10">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="data:image/jpeg;base64,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"
                alt="Produto 3">
            <h3>Lata De Nescau</h3>
            <p>Uma lata de Nescau é um verdadeiro ícone da hora do café da manhã ou do lanche da tarde.</p>
            <h4>Preço</h4>
            <a>5,00 R$</a>
            <br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="11">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="https://divf32e1br5es.cloudfront.net/Custom/Content/Products/49/49/49490_leite-ninho-forti-380g-integral-lata-p126684_z1_637795650946728546.jpg"
                alt="Produto 4">
            <h3>Leite Ninho</h3>
            <p>Uma lata de Leite Ninho é um tesouro na despensa de muitos lares.</p>
            <h4>Preço</h4>
            <a>5,00 R$</a>
            <br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="12">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="https://tse3.mm.bing.net/th?id=OIP.Bkwn_4j_284F6pa1tR4-VQHaHa&pid=Api&P=0&h=180" alt="Produto 5">
            <h3>Treloso Chocolate</h3>
            <p>Biscoito Treloso é uma marca bastante conhecida de biscoitos no Brasil.</p>
            <h4>Preço</h4>
            <a>5,00 R$</a>
            <br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="13">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="produto">
            <img src="data:image/jpeg;base64,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"
                alt="Produto 6">
            <h3>Nutella</h3>
            <p>Nutella é um creme de avelã com cacau de origem italiana, amado mundialmente por seu sabor único e
                textura
                cremosa.</p>
            <h4>Preço</h4>
            <a>5,00 R$</a>
            <br><br>
            <form action="adicionar_carrinho.php" method="POST">
                <input type="hidden" name="id_produto" value="14">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
        </section>

        <div id="cart-actions">
            <button onclick="clearCart()">Cancelar Toda Compra</button>
        </div>

        <!-- Formulário para adicionar novos produtos -->
        <section id="add-product">
    <h2>Adicionar Novo Produto</h2>
    <form id="product-form" method="POST" action="inserir_produto.php" enctype="multipart/form-data">
        <label for="product-name">Nome:</label>
        <input type="text" id="product-name" name="nome" required>
        <label for="product-description">Descrição:</label>
        <input type="text" id="product-description" name="descricao" required>
        <label for="product-price">Preço:</label>
        <input type="number" id="product-price" name="preco" required>
        <label for="product-image">Imagem:</label>
        <input type="file" id="product-image" name="imagem" accept="image/*" required>
        <button type="submit">Adicionar Produto</button>
    </form>
    <button id="remove-products-button">Remover Todos os Produtos</button>
</section>

    <footer>
        <p>&copy; 2024 Supermercado Online. Todos os direitos reservados.</p>
    </footer>

    <div id="floating-cart">
        <a id="cart-icon" href="#"><img src="imagens/cart-icon.png" alt="Carrinho">
            <span id="cart-count">0</span>
            <span id="cart-total">0,00 R$</span>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="teste.js"></script>
</body>

</html>


