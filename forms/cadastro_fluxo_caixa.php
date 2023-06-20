<?php
    require "conexao.php";

    $data = $_POST['date'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $hist = $_POST['hist'];
    $cheque = $_POST['cheque'];

    $var = explode("-", $data);
    $d = $var[2];
    $m = $var[1];
    $y = $var[0];
    echo $data = "$y-$m-$d";


        $sql = "INSERT INTO fluxo_caixa VALUES(NULL, '$data', '$tipo', '$valor', '$hist', '$cheque')";
        $res = mysqli_query($con, $sql);
            if(mysqli_affected_rows($con) == 1){
                header("Location:listar_fluxo.php");
            } else{
                echo "Falha na gravação do registro<br>";
            }

    mysqli_close($con);
?>