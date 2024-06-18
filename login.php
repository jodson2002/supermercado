<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tela de Login</title>
</head>
<body>
    <form class="Login" action="processar_login.php" method="POST">
        <h2>Login</h2>
        <div class="box-user">
            <input type="text" name="email" required>
            <label>Email</label>
        </div>
        <div>
            <div class="box-user">
                <input type="password" name="senha" required>
                <label>Senha</label>
        </div>
        <div>
            <a href="formulario.php" class="Register">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Registre-se  
            </a>
        </div>
        </a>
        <button type="submit" class="btn">
           <span></span>
           <span></span>
           <span></span>
           <span></span>
           Entrar 
        </a>
        </button>
    </form>
</body>
</html>