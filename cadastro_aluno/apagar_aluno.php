<?php

    session_start();

include_once("index.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "DELETE FROM tbcadastroaluno WHERE id='$id' ";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
if(mysqli_affected_rows($conexao)) {
    $_SESSION['msg'] = "<p>Usuário apagado com sucesso</p>";
    //header("location: index.php");
    
} // else {
   // $_SESSION['msg'] = "<p style='color: red;'>Usuário não foi apagado com sucesso</p>";
   // header("Location: index.php");
//}

?>
<html>
	<head>
	<title>apagar</title>
</head>
<body>





</body>
</html>