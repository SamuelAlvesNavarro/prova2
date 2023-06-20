<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body class="p-5">
    <div class="container text-center mb-3 border">
        <div class="row align-items-start">
            <h1 align="center-2" class="col">Consulta de Fluxo de Caixa</h1>
                <?php
                    require "conexao.php";
                    $sql = "SELECT * FROM fluxo_caixa ORDER BY id";
                    // mysli_qurey => executa uma comando no banco
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);

                    mysqli_close($con);
                ?>
            <a href="index.php" class="p-2 col-2"><button type="button" class="btn-close" disabled aria-label="Close"></button></a>
        
            <table align="center" class="col-3 table table-striped border border-black border-1 p-2" style="width: 1200px;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Data</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Historico</th>
                        <th scope="col">Cheque</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $key => $row){
                            echo "<tr scope='row'>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['data']."</td>";
                            echo "<td>".$row['tipo']."</td>";
                            echo "<td>".$row['valor']."</td>";
                            echo "<td><a href='alterar_fluxo.php?id=". $row['id'] ."'>".$row['historico']."</a></td>";
                            echo "<td>".$row['cheque']."</td>";
                            echo "<td><a href='excluir_fluxo.php?id=". $row['id'] ."'><button class='btn btn-danger'>Excluir</button></a></td>";
                            echo "</tr>";
                        }
                    ?>
                    <tr>
                        <th><a href="index.php">Voltar</a></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>