<?php

$usuario = 'root';
$senha = '';
$database = 'projeto_crud';
$host = 'localhost';

$link = new mysqli($host, $usuario, $senha, $database);

if($link->error) {
    die("Falha ao conectar ao banco de dados: " . $link->error);
}

?>

