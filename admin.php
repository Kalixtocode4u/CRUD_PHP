<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="m-3 p-2 border-bottom border-info border-5">
        <h1>login admin</h1>
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

            <button type="submit" name="submit" class="btn btn-primary mt-3"><b class="h3">Logar</b></button>
        </form>
    </main>
</body>
</html>
<?php
if(isset($_POST["submit"])){
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    // Login com acesso do bando de dados
    if($senha == 123456 && $email == "admin@email.com"){
        //echo "Logado com sucesso ";
        header("location: clientes/clientes.php");
    }else{
        echo "Login invalido";
    }

}
?>