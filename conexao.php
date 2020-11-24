<?php
//Conexão com o Banco de Dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db_name = "bancotcc";
//$servidor = "sql213.epizy.com";
//$usuario = "epiz_27286746";
//$senha = "ot04m6CRwVlS1nQ";
//$db_name = "epiz_27286746_bancotcc";


$conexao = mysqli_connect($servidor, $usuario, $senha,
$db_name)
 or die ("Erro de Conexão");

?>