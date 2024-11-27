<?php

$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'sos_main';

$conn = new mysqli($server, $usuario, $senha, $banco);

if($conn->connect_error){
    die("Falha ao se conectar ao banco de dados: ".$conn->connect_error);
}

?>