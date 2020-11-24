<?php

//CONEXÃO: Pega o código de conexao.php e executa aqui ___Pegar registro do banco de dados
require_once '../conexao.php';

//Sessão
if(!isset($_SESSION)) {
        session_start();
    }

//VERIFICAÇÃO
if(!isset($_SESSION['logado'])):
        header('Location: ../index.php');
endif;

//Dados para exibir o nome da pessoa que entrou.   ___Pegar registro do banco de dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM sistemalogin WHERE id = '$id'";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($resultado);
//fechar a conexao ao banco de dados
//mysqli_close($conexao);

?>


<!DOCTYPE html>
<html>
<head>
        <meta charset="Utf-8">
        <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tela Inicial</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/estilohome.css">
        <link rel="stylesheet" href="css/estiloPostagem.css">
        <link rel="stylesheet" href="css/estiloPesquisa.css">
        <link rel="stylesheet" href="css/estiloBotaoSair.css">
        
</head>

<body> 

<header>
        <a><img src="../imagem/tcc_img.png" alt="Logo Tcc"></a> 

        <nav>
	  <ul>
                <li><a href="../cadastro_aluno/index.php">Aluno</a></li>
		<li><a href="../cadastro_prof/index.php">Orientador</a></li>
		<li><a href="home.php">TCC</a></li>
                <li><a href="../orientacoes/index.php">Orientações</a></li>
                <li><a href="../estrutura_escrita/index.php">Estrutura de Escrita</a></li>
	  </ul>
        </nav> 
</header>

<div class="titulo">
<h1>Sistema de Gerenciamento de Conclusão de Curso - TCC <div class="botaoSair">
        <a href="logout.php"> Sair </a>
</div></h1>
</div>

<!--EXIBIR O FORMULÁRIO DE PESQUISA E A PESQUISA -->
<div class="pesquisa">
<!-- Fazer a pesquisa dos textos -->
<h3> Pesquisar por Matricula e Título </h3>
<p>Obs: O resultado aparecerá no final da página </p>
<br>
<br>
<form method="POST" action="pesquisar.php">
    Pesquisar:<input type="text" name="pesquisar" placeholder="pesquisar" class="input_pesquisar">
    <input type="submit" value="Enviar" class="enviar">
</form>
<br>
</div>



<?php

//Conecta ao banco de dados bancoTcc
//require_once '../cadastro_aluno/conexao.php';

//EXIBIR POSTAGEM NA TELA:
//query mysql
$sql = "SELECT * FROM estrutura_escrita";

//Variável que retorna o resultado de execução
$resultados = mysqli_query($conexao, $sql);


//Laço de repetição para dar um print de cada item do array
while($resultado = mysqli_fetch_array($resultados)): ?>

<div class="postagem">

    <h4> Nome: <?= $resultado['nome'] ?> </h4>
    <h4> Matrícula: <?= $resultado['matricula'] ?> </h4>
    <h6> Título: <?= $resultado['titulo'] ?> </h6>
    <br>
    <p><strong> Resumo:</strong> <?= $resultado['resumo'] ?><br> </p> 
    <br>
    <br>
    <p><strong> Introdução:</strong> <?= $resultado['introducao'] ?><br> </p>
    <p><strong>Referência Teórica:</strong> <?= $resultado['referenciaTeorica'] ?><br> </p>
    <p><strong> Metodologia:</strong> <?= $resultado['metodologia'] ?><br> </p>
    <p><strong> Análise:</strong> <?= $resultado['analise'] ?><br> </p>
    <p><strong> Conclusão:</strong><?= $resultado['conclusao'] ?><br> </p>
    <p><strong>  Referência Biografica:</strong> <?= $resultado['referenciaBiografica'] ?><br><br> </p>
  <?php echo "<div class='botaoapagar'><a href='apagar_usuario.php?id=" . $resultado['id'] . "'>Apagar</a><br><hr></div>";  ?>


</div>
<?php endwhile; ?>

<!--
<div class="botaoSair">
        <a href="logout.php"> Sair </a>
</div>

<div class="footer">

</div>
-->
</body>
</html>