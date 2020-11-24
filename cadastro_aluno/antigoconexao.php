<!--
//Conexão com o Banco de Dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db_name = "bancotcc";


$conexao = mysqli_connect($servidor, $usuario, $senha,
$db_name)
 or die ("Erro de Conexão");

?>