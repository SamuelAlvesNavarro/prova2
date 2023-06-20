<?php
    require 'conexao.php';
    $id = $_GET['id'];
    
    $sql = "DELETE FROM fluxo_caixa WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_affected_rows($con);
    if($row == 1){
        header("Location:listar_fluxo.php");
    } else{
        echo "Falha na gravação do registro<br>";
    }
?>