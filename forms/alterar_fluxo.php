<?php
    require 'conexao.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM fluxo_caixa WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    if($row['tipo'] == 'entrada'){
        $tp = "<input type='radio' name='tipo' value='entrada' checked> Entrada";
        $tpr = "<input type='radio' name='tipo' value='saida'> Saída";
    }else{
        $tp = "<input type='radio' name='tipo' value='entrada'> Entrada";
        $tpr = "<input type='radio' name='tipo' value='saida' checked> Saída";
    }

    $data = $row['data'];

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="text-center container-fluid p-4">
        <h1 class="h1">Alterar Dados do Fluxo de Caixa - IFSP</h1>
    </div>
    <form method="post" action="cadastro_fluxo_caixa.php" class="container border border-black border-1 align-middle container-md mb-5">
        <input type="hidden" value="<?php echo $id; ?>">
        <div>
            <label for="" class="form-label">Data: </label>
            <input type="date" class="form-control" name="date" id="nome" required style="width: 12%;" value="<?php echo $data; ?>"><br>
        </div>

        <div>
            <label for="" class="form-label">Tipo: </label>
            <?php echo $tp; ?>
            <?php echo $tpr; ?>
        </div>

        <div>
            <label for="" class="form-label">Valor: </label>
            <input type="number" class="form-control" name="valor" id="nome" style="width: 17%;" step=".01" required placeholder="Insira o valor" value="<?php echo $row['valor'];?>"><br>
        </div>

        <div>
            <label for="" class="form-label">Histórico: </label>
            <input type="text" class="form-control" name="hist" id="nome" required placeholder="Descrição" value="<?php echo $row['historico'];?>"><br>
        </div>

        <div>
            <label for="" class="form-label">Cheque: </label>
            <select name="cheque">
                <?php 
                    if($row['cheque'] == 'sim'){
                        echo $sim = "<option value='sim'>Sim</option>";
                        echo $nao = "<option value='não'>Não</option>";
                    }else{
                        echo $nao = "<option value='não'>Não</option>";
                        echo $sim = "<option value='sim'>Sim</option>";
                    }
                ?>
            </select>
        </div>

        <div>
            <input type="submit" value="Alterar" class="btn btn-outline-primary mb-3 ms-3">
        </div>
    </form>
</body>
</html>