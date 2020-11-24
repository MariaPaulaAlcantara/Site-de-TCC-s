<?php 

//Conecta ao banco de dados bancoTcc
require_once '../conexao.php';
session_start();

?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Cadastro Aluno</title>
        <link rel="stylesheet" href="css/estiloestruturaEscrita.css">
        <link rel="stylesheet" href="../sistema_Login/css/estilohome.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    </head>
    
<body>
    
<header>
        <a><img src="../imagem/tcc_img.png" alt="Logo Tcc"></a> 

        <nav>
	  <ul>
		<li><a href="../cadastro_aluno/index.php">Aluno</a></li>
		<li><a href="../cadastro_prof/index.php">Orientador</a></li>
		<li><a href="../sistema_Login/home.php">TCC</a></li>
        <li><a href="../orientacoes/index.php">Orientações</a></li>
        <li><a href="../estrutura_escrita/index.php">Estrutura de Escrita</a></li>
	  </ul>
        </nav> 
</header>
<br>
<section>
<h1 class="titulo"> Estrutura de escrita </h1>
<br>
<br>
<h2 class="subTitulo">Dados do TCC </h2>
</section>



<?php

require_once '../conexao.php';


//cadastrar no banco de dados:
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = md5(implode($_POST));
    if(isset($_SESSION['ultima_request']) &&  $_SESSION['ultima_request'] == $request) {
        echo "Usuário já foi cadastrado";
    } else { 
    $_SESSION['ultima_request'] = $request;
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $titulo = $_POST['titulo'];
    $resumo = $_POST['resumo'];
    $introducao = $_POST['introducao'];
    $referenciaTeorica = $_POST['referenciaTeorica'];
    $metodologia = $_POST['metodologia'];
    $analise = $_POST['analise'];
    $conclusao = $_POST['conclusao'];
    $referenciaBiografica = $_POST['referenciaBiografica'];

    $result_dados_pessoais = "INSERT INTO estrutura_escrita (matricula, nome, titulo, resumo, introducao, referenciaTeorica, metodologia, analise, conclusao, referenciaBiografica) VALUES ('$matricula', '$nome', '$titulo', '$resumo', '$introducao', '$referenciaTeorica', '$metodologia', '$analise', '$conclusao', '$referenciaBiografica')";
    $resultado_dados_pessoais = mysqli_query($conexao, $result_dados_pessoais);
    //ID do usuario inserido
    $ultimo_id = mysqli_insert_id($conexao);
    
    echo "<div class='cadastrado'>Usuário Cadastrado com sucesso</div>";
    }
}

?>


<main>
    <form action="index.php" method="POST">
        <label class= "matricula" for="matricula">Matrícula</label>
	    <input type="matricula" name="matricula" id="matricula" class="input-padrao" required>

        <label for="nome"> Nome e Sobrenome </label>
        <input type="text" name="nome" id="nome" class="input-padrao" required>

        <label for="titulo">Título do Trabalho</label>
        <input type="titulo" name="titulo" id="titulo" class="input-padrao" required>
       
        <label for="resumo">Resumo do Trabalho</label>
        <textarea cols="70" rows="10" class="input-padrao" name="resumo" required></textarea>

        <label for="introducao">Introdução</label>
        <textarea cols="70" rows="10" class="input-padrao" name="introducao" required></textarea>

        <label for="referenciaTeorica">Referência Teórica</label>
        <textarea cols="70" rows="10" class="input-padrao" name="referenciaTeorica" required></textarea>

        <label for="metodologia">Metodologia</label>
        <textarea cols="70" rows="10" class="input-padrao" name="metodologia" required></textarea>
     
        <label for="analise">Analise e Resultados</label>
        <textarea cols="70" rows="10" class="input-padrao" name="analise" required></textarea>

        <label for="conclusao">Conclusões</label>
        <textarea cols="70" rows="10" class="input-padrao" name="conclusao" required></textarea>

        <label for="referenciaBiografica">Referência Biografica</label>
        <textarea cols="70" rows="10" class="input-padrao" name="referenciaBiografica" required></textarea>

        <input type="submit" value="Salvar" class="salvar">
    </form>
</main>



        


</body>
</html>