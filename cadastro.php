<?php
require('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar cliente</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="m-3 p-2 border-bottom border-info border-5">
        <h1>Cadastro</h1>
        <a href="index.php">Inicio</a>
    </header>
    <main class="container bg-light">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" placeholder="Nome" class="form-control">
    
            <label class="form-label">Email</label>
            <input type="text" name="email" placeholder="Email" class="form-control">
                
            <label class="form-label">Senha</label>
            <input type="password" name="senha" placeholder="Senha" class="form-control">
                
            <label class="form-label">Tipo Cliente(CPF/CNPJ)</label>
            <input type="text" name="tipo_cliente" placeholder="cpf/cnpj" class="form-control">
            
            <label class="form-check-label mt-3 mb-3">Requer Login para ver os preços? <br>
                <input type="radio" class="form-check-input" name="requer_login" value="S"><label class="form-check-label">Sim</label>
                <input type="radio" class="form-check-input" name="requer_login" value="N"><label class="form-check-label">Não</label>
            </label><br>
    
            <label class="form-label">Valor Minimo</label>
            <input type="number" name="valor_minimo" placeholder="1000" class="form-control">
    
            <button type="submit" name="submit" class="btn btn-primary my-3">Registrar</button>
        </form>
    </main>
</body>
</html>
<?php

if(isset($_POST["submit"])){
    $nome           = $_POST["nome"];
    $email          = $_POST["email"];
    $senha          = $_POST["senha"];
    $requer_login   = $_POST["requer_login"];
    $tipo_cliente   = $_POST["tipo_cliente"];
    $valor_minimo   = $_POST["valor_minimo"];
    
    $inserir = "INSERT INTO tb_clientes(nome,email,senha,requer_login,tipo_cliente,valor_minimo)
                VALUES ('$nome','$email','$senha','$requer_login','$tipo_cliente','$valor_minimo');";
    
    if(mysqli_query($conexao, $inserir) == TRUE){
        echo "Cliente inserido com sucesso";
        header("Location: clientes.php");
        die();
    }else{
        echo "Erro do cadastro! :(";
    }

}
?>
