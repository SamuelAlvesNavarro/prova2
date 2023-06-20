<?php
    require 'conexao.php';

    $id = $_POST['id'];
    $data = $_POST['date'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $hist = $_POST['hist'];
    $cheque = $_POST['cheque'];

    $var = explode("-", $data);
    $d = $var[2];
    $m = $var[1];
    $y = $var[0];
    $data = "$y-$m-$d";

    $update = "UPDATE fluxo_caixa SET data = '$data', tipo = '$tipo', valor = '$valor', historico = '$hist' cheque = '$cheque' WHERE id = '$id'";
    mysqli_query($con, $update);
    mysqli_close($con);
    header('Location:index.php');
?>