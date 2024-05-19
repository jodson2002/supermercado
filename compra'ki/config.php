<?<php

    $dbHost = 'Localhost'
    $dbUsename = 'root'
    $dbPassword = '5330'
    $dbNamo = 'formulario'

    $conexao = new mysqli($dbHost, $dbUsename, $dbPassword, $dbNamo);

    if($conexao->conect_erro){
        echo 'Erro'
    }
    else{
        echo 'conexao efetuada com sucesso'
    }

?>