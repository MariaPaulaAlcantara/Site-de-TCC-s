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
		<title>Cadastro Orientador</title>
        <link rel="stylesheet" href="css/estiloCadastroProf.css">
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
<h1 class="titulo"> Sistema de Cadastro do Orientador </h1>
<br>
<br>
<h2 class="subTitulo">Dados do Orientador </h2>
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
        $orientador = $_POST['orientador'];
        $curso = $_POST['curso'];
        $titulacao = $_POST['titulacao'];
        $conhecimento = $_POST['conhecimento'];

        $result_dados_pessoais = "INSERT INTO tb_cadastro_orientador (matricula, orientador, curso, titulacao, conhecimento) VALUES ('$matricula', '$orientador', '$curso', '$titulacao', '$conhecimento')";
        $resultado_dados_pessoais = mysqli_query($conexao, $result_dados_pessoais);
        //ID do usuario inserido
        $ultimo_id = mysqli_insert_id($conexao);
        echo "<div class='cadastrado'>Usuário Cadastrado com sucesso</div>";
        }
    }

?>

<main>
    <form method="POST" action="index.php">
        <label class= "matricula" for="matricula">Matrícula</label>
	    <input type="matricula" name="matricula" class="input-padrao" value="<?php if(isset($_SESSION['matricula'])) { echo $_SESSION['matricula']; } ?>" frequired>

        <label for="orientador"> Orientador </label>
        <input type="text" name="orientador"  class="input-padrao" value="<?php if(isset($_SESSION['orientador'])) { echo $_SESSION['orientador']; } ?>" required>

        <label for="curso">Curso</label>
		<input type="curso" name="curso" class="input-padrao" value="<?php if(isset($_SESSION['curso'])) { echo $_SESSION['curso']; } ?>" required>

        <label for="conhecimento">Área de Conhecimento</label>
        <input type="conhecimento" name="conhecimento" class="input-padrao" value="<?php if(isset($_SESSION['conhecimento'])) { echo $_SESSION['conhecimento']; } ?>" required>
        
        <fieldset>
            <legend>Titulação</legend>
                <select name="titulacao" id="titulacao">
                    <option>Doutorado</option>
                    <option>Mestrado</option>
                    <option>Graduação</option>
                </select>
        </fieldset>

        <input type="submit" name="salvar" value="Salvar" class="salvar">
    </form>
</main>

<?php

// RESULTADO DO CADASTRO 
//EXIBIR POSTAGEM NA TELA:
//query mysql
$sql = "SELECT * FROM tb_cadastro_orientador";

//Variável que retorna o resultado de execução
$resultados = mysqli_query($conexao, $sql);


//Laço de repetição para dar um print de cada item do array
while($resultado = mysqli_fetch_array($resultados)): ?>

<div class="postagem"> 

    <table>
        <thead>
<tr class="cabecalhotabela">
    <td>Matrícula</td>
    <td>Orientador</td>
    <td>Curso</td>
    <td>Titulação</td>
    <td>Área de Conhecimento</td>
    <td></td>
</tr>
</thead>
<tbody>
<tr>
    <td><?= $resultado['matricula'] ?></td>
    <td><?= $resultado['orientador'] ?></td>
    <td><?= $resultado['curso'] ?></td>
    <td><?= $resultado['titulacao'] ?></td>
    <td><?= $resultado['conhecimento'] ?></td><br>
    <td> <?php echo "<div class='botaoapagar'><a href='apagar_prof.php?id=" . $resultado['id'] . "'>Apagar</a><br><hr></div>";  ?></td>
    </tr>
  
</tbody>
</table>

</div>
<?php endwhile; ?>

</body>
</html>