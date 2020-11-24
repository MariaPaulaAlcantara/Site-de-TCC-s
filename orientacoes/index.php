<?php 
//Conecta ao banco de dados bancoTcc
require_once '../conexao.php';
if(!isset($_SESSION)) {
    session_start();
}


?>



<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Cadastro Orientações</title>
        <link rel="stylesheet" href="css/estiloCadastroOrientacoes.css">
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
<h1 class="titulo"> Sistema de Orientações </h1>
<br>
<br>
<h2 class="subTitulo">Dados do Aluno a ser orientado </h2>
</section>

<?php
//cadastrar no banco de dados:
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $request = md5(implode($_POST));
        if(isset($_SESSION['ultima_request']) &&  $_SESSION['ultima_request'] == $request) {
            echo "Usuário já foi cadastrado";
        } else { 
        $_SESSION['ultima_request'] = $request;
        $matricula = $_POST['matricula'];
        $aluno = $_POST['aluno'];
        $areaTrabalho = $_POST['areaTrabalho'];
        $orientadorResponsavel = $_POST['orientadorResponsavel'];
        $orientacoes = $_POST['orientacoes'];

        $result_dados_pessoais = "INSERT INTO orientacoes_cadastradas (matricula, aluno, areaTrabalho, orientadorResponsavel, orientacoes) VALUES ('$matricula', '$aluno', '$areaTrabalho', '$orientadorResponsavel', '$orientacoes')";
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

        <label for="aluno"> Aluno: </label>
        <input type="text" name="aluno" id="aluno" class="input-padrao" required>

        <label for="areaTrabalho">Área de Conhecimento do Trabalho</label>
        <input type="titulo" name="areaTrabalho" id="areaTrabalho" class="input-padrao" required>

        <label for="orientadorResponsavel">Orientador Responsavel</label>
        <input type="titulo" name="orientadorResponsavel" id="orientadorResponsavel" class="input-padrao" required>
        
        <label for="orientacoes">Orientações</label>
        <textarea cols="70" rows="10" class="input-padrao" name="orientacoes" required></textarea>
        
        <input type="submit" value="Salvar" class="salvar">
    </form>
</main>

<?php

// RESULTADO DO CADASTRO 
//EXIBIR POSTAGEM NA TELA:
//query mysql
$sql = "SELECT * FROM orientacoes_cadastradas";

//Variável que retorna o resultado de execução
$resultados = mysqli_query($conexao, $sql);


//Laço de repetição para dar um print de cada item do array
while($resultado = mysqli_fetch_array($resultados)): ?>

<div class="postagem"> 

    <table>
        <thead>
<tr class="cabecalhotabela">
    <td>Matrícula</td>
    <td>Aluno</td>
    <td>Orientador Responsavel</td>
    <td>Área do Trabalho</td>
    <td>Orientações</td>
    <td></td>
</tr>
</thead>
<tbody>
<tr>
    <td><?= $resultado['matricula'] ?></td>
    <td><?= $resultado['aluno'] ?></td>
    <td><?= $resultado['orientadorResponsavel'] ?></td>
    <td><?= $resultado['areaTrabalho'] ?></td>
    <td><?= $resultado['orientacoes'] ?></td><br>
    <td> <?php echo "<div class='botaoapagar'><a href='apagar_orientacoes.php?id=" . $resultado['id'] . "'>Apagar</a><br><hr></div>";  ?></td>
    </tr>
  
</tbody>
</table>

</div>
<?php endwhile; ?>

</body>
</html>