<?php
require("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Teste</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="m-3 p-2 border-bottom border-info border-5">
        <h1>login</h1>
        <a href="index.php">voltar</a>
    </header>
    <main class="container bg-light rounded p-2">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label class="form-label h3 m-1">Nome</label>
            <input name="nome" class="form-control" type="text">

            <label class="form-label h3 m-1">Email</label>
            <input name="email" class="form-control" type="text">

            <label class="form-label h3 m-1">Senha</label>
            <input name="senha" class="form-control" type="password">

            <label class="form-label h3 m-1">CPF/CNPJ</label>
            <input name="documento" class="form-control" type="text">

            <button type="submit" name="submit" class="btn btn-primary mt-3"><b class="h3">Logar</b></button>
        </form>
        <a class="h5" href="cadastro.php">Não Tem Conta? crie agora</a><br>
        <a class="text-secondary" href="admin.php">admin</a>
    </main>
</body>
</html>
<?php

// login basico para teste
if(isset($_POST["submit"])){
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $documento = $_POST["documento"];

    $selecionar = "SELECT nome, senha, email, tipo_cliente FROM tb_clientes WHERE email = '$email';";
    $consulta = mysqli_query($conexao,$selecionar);
    
    if(mysqli_num_rows($consulta)> 0){
        foreach($consulta as $user){
            if($user["email"] == $email && $user['tipo_cliente'] == $documento && $user['senha'] == $senha){
                header("location: https://agoraped.com.br/");
            }
        }
    }else{
        echo "Login invalido";
    }
}
?>