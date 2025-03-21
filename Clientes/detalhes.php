<?php
require("../conexao.php");

$id = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes cliente</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="m-3 p-2 border-bottom border-info border-5">
        <h1>detalhes cliente</h1>
        <a href="clientes.php">voltar</a>
    </header>
    <main class="container bg-light">
        <?php
        $selecionar = "SELECT nome, senha, email, requer_login, tipo_cliente, valor_minimo FROM tb_clientes WHERE id='$id';";
        $consulta = mysqli_query($conexao,$selecionar);
        if(mysqli_num_rows($consulta) != 0){
            foreach($consulta as $row){
            ?>
            <p>Nome: <u><?php echo $row['nome']?></u></p>
            <p>Email: <u><?php echo $row['email']?></u></p>
            <p>Senha: <u><?php echo $row['senha']?></u></p>
            <p>Requer login para ver os preços: <u><?php echo $row['requer_login']?></u></p>
            <p>Tipo cliente: <u><?php echo $row['tipo_cliente']?></u></p>
            <p>Valor minimo: <u><?php echo $row['valor_minimo']?></u></p>
            <?php
            }
        }
        ?>
    </main>
</body>
</html>