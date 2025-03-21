<?php
require("../conexao.php");

$id = $_GET["id"];

$deletar = "DELETE FROM tb_clientes where id = '$id'";

if(mysqli_query($conexao,$deletar)){
    echo "operação bem sucedida";
    header("Location: clientes.php");
}else{
    echo "Erro na operação";
}

die();

?>