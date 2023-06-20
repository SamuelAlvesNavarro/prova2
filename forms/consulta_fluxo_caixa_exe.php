<?php

    require 'conexao.php';

    $tipo = $_POST['consulta'];

    if($tipo == 'entrada'){
        $sql = "SELECT sum(valor) valor FROM fluxo_caixa WHERE tipo = 'entrada'";
    }else if($tipo == 'saida'){
        $sql = "SELECT sum(valor) valor FROM fluxo_caixa WHERE tipo = 'saida'";
    }else if($tipo == 'saldo'){
        $sql = "SELECT sum(case when tipo = 'entrada' then valor else 0 end) - sum(case when tipo = 'saida' then valor else 0 end) as valor FROM fluxo_caixa";
    }

    foreach(mysqli_query($con, $sql) as $key => $value){
        $valor = $value['valor'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if($tipo == 'entrada'){
            echo "A entrada foi de: $valor<br>";
        }else if($tipo == 'saida'){
            echo "A saída foi de: $valor<br>";
        }else if($tipo == 'saldo'){
            echo "O saldo foi de: $valor<br>";
        }
    ?>
    <a href="index.php">Voltar</a>
</body>
</html>