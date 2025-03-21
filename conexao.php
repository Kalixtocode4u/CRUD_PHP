<?php

$db_server = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_database = "db_teste";

$conexao = mysqli_connect($db_server, $db_user, $db_pass, $db_database);

if (mysqli_connect_errno()) {
    echo "Conexao morreu :(\nErro: ". mysqli_connect_error();
}

?>