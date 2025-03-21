<?php
require("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar tabela</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="m-3 p-2 border-bottom border-info border-5">
        <h1>clientes</h1>
        <a href="../index.php">voltar</a>
    </header>
    <main class="container-fluid">
        <div>
            <div class="row">
                <div class="col text-center">id</div>
                <div class="col text-center">nome</div>
                <div class="col text-center">email</div>
                <div class="col text-center">tipo cliente</div>
                <div class="col text-center">requer login</div>
                <div class="col text-center">valor minimo</div>
                <div class="col-3 text-center">opções</div>
            </div>
            <?php
                $selecionar = "SELECT id, nome, email, requer_login, tipo_cliente, valor_minimo FROM tb_clientes";
                $consulta = mysqli_query($conexao,$selecionar);
                if(mysqli_num_rows($consulta) > 0){
                    foreach($consulta as $cliente){
                        ?>
                        <form action="detalhes.php?id=<?= $cliente['id']?>" method="POST">
                            <div class="row bg-light p-1 m-1 rounded-4">
                                <div class="col text-center" name="id" value="<?= $cliente['id'] ?>" disabled ><?= $cliente['id'] ?></div>
                                <div class="col text-center" name="nome" value="<?= $cliente['nome'] ?>" disabled><?= $cliente['nome'] ?></div>
                                <div class="col text-center" name="email" value="<?= $cliente['email'] ?>" disabled><?= $cliente['email'] ?></div>
                                <div class="col text-center" name="tipo_cliente" value="<?= $cliente['tipo_cliente'] ?>" disabled><?= $cliente['tipo_cliente'] ?></div>
                                <div class="col text-center" name="requer_login" value="<?= $cliente['requer_login'] ?>" disabled><?= $cliente['requer_login'] ?></div>
                                <div class="col text-center" name="volar_minimo" value="<?= $cliente['valor_minimo'] ?>" disabled><?= $cliente['valor_minimo'] ?></div>
                                <div class="col-3 text-center">
                                    <button type="submit" name="editar" formaction="editar.php?id=<?= $cliente['id']?>" class="btn btn-secondary text-white">Editar</button> | 
                                    <button type="submit" name="detalhes" class="btn btn-secondary text-white">Detalhes</button> | 
                                    <button type="submit" name="excluir" formaction="excluir.php?id=<?= $cliente['id']?>" class="btn btn-danger text-white">Excluir</button>
                                </div>
                            </div>
                        </form>
                        
                        <?php
                    }
                }
                ?>
        <a href="criar.php" class="btn btn-primary mx-auto">Criar Novo Cliente Rapido</a>
        </div>

    </main>
</body>
</html>