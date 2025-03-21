<?php
require("../conexao.php");

$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="m-3 p-2 border-bottom border-info border-5">
        <h1>Alterar cliente</h1>
        <a href="clientes.php">voltar</a>
    </header>
    <main class="container bg-light">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?id=" . $id; ?>" method="POST">
            <?php
            $selecionar = "SELECT nome, senha, email, requer_login, tipo_cliente, valor_minimo FROM tb_clientes WHERE id='$id';";
            $consulta = mysqli_query($conexao,$selecionar);
            if(mysqli_num_rows($consulta) != 0){
                foreach($consulta as $row){
                    ?>
            <label class="form-label">Nome</label>
            <input type="text" name="nome" value="<?= $row['nome'] ?>" class="form-control">

            <label class="form-label">Email</label>
            <input type="text" name="email" value="<?= $row['email'] ?>" class="form-control">

            <label class="form-label">Senha</label>
            <input type="text" name="senha" value="<?= $row['senha']?>" placeholder="Senha" class="form-control">
                
            <label class="form-label">Tipo Cliente(CPF/CNPJ)</label>
            <input type="text" name="tipo_cliente" value="<?= $row['tipo_cliente'] ?>" class="form-control">
                
            <label class="form-check-label mt-3 mb-3">Requer Login para ver os preços?<br>
            <?php
            if($row['requer_login'] == "S"){
            ?>
                <input type="radio" name="requer_login" value="S" checked="true" class="form-check-input"><label class="form-check-label">Sim</label>
                <input type="radio" name="requer_login" value="N" class="form-check-input"><label class="form-check-label">Não</label>
            <?php    
            }else{
            ?>
                <input type="radio" name="requer_login" value="S" class="form-check-input"><label class="form-check-label">Sim</label>
                <input type="radio" name="requer_login" value="N" checked="true" class="form-check-input"><label class="form-check-label">Não</label>
            <?php
            }
            ?>
            </label><br>

            <label class="form-label">Valor Minimo</label>
            <input type="number" name="valor_minimo" value="<?= $row['valor_minimo'] ?>" class="form-control">

            <button type="submit" name="submit" class="btn btn-success my-3">Alterar Registro 
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                </svg>
            </button>

                    <?php
                }
            }
            ?>
        </form>
    </main>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $nome           = $_POST["nome"];
    $email          = $_POST["email"];
    $requer_login   = $_POST["requer_login"];
    $tipo_cliente   = $_POST["tipo_cliente"];
    $valor_minimo   = $_POST["valor_minimo"];

    $alterar = "UPDATE tb_clientes
                SET nome = '$nome',
                    email = '$email',
                    requer_login = '$requer_login',
                    tipo_cliente = '$tipo_cliente',
                    valor_minimo = '$valor_minimo'
                WHERE id = '$id';";

    if(mysqli_query($conexao, $alterar) == TRUE){
        echo "cliente foi alterado com sucesso";
        header("Location: clientes.php");
        die();
    }else{
        echo "Erro :(";
    }
}
?>