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
		<title>Cadastro Aluno</title>
        <link rel="stylesheet" href="css/styleCadastroaluno.css">
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
<h1 class="titulo"> Sistema de Cadastro do Aluno </h1>
<br>
<br>
<h2 class="subTitulo">Dados do Aluno </h2>
</section>


<?php
//cadastrar no banco de dados:
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = md5(implode($_POST));
    if(isset($_SESSION['ultima_request']) &&  $_SESSION['ultima_request'] == $request) {
            echo "Usuario Cadastrado"; 
    } else {
        $matricula = $_POST['matricula'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $curso = $_POST['curso'];
        $disciplina = $_POST['disciplina'];

        $result_dados_pessoais = "INSERT INTO tbcadastroaluno (matricula, nome, email, curso, disciplina) VALUES ('$matricula', '$nome', '$email', '$curso', '$disciplina')";
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
	    <input type="matricula" name="matricula" id="matricula" class="input-padrao" value="<?php if(isset($_SESSION['matricula'])) { echo $_SESSION['matricula']; } ?>" required>

        <label for="nome"> Nome e Sobrenome </label>
        <input type="text" name="nome" id="nome" class="input-padrao" value="<?php if(isset($_SESSION['nome'])) { echo $_SESSION['nome']; } ?>" required>

        <label for="email">Email</label>
		<input type="email" name="email" id="email" class="input-padrao" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; } ?>" required placeholder="seuemail@dominio.com">

        <label for="curso">Curso</label>
	    <input type="curso" name="curso" id="curso" class="input-padrao" value="<?php if(isset($_SESSION['curso'])) { echo $_SESSION['curso']; } ?>" required placeholder="Ciências da Computação">

        <label for="disciplica">Disciplina</label>
        <input type="disciplina" name="disciplina" id="disciplina" class="input-padrao" value="<?php if(isset($_SESSION['disciplina'])) { echo $_SESSION['disciplina']; } ?>" required>
        
        <input type="submit" name="salvar" value="Salvar" class="salvar">
    </form>
</main>


<?php

//Conecta ao banco de dados bancoTcc
//require_once '../cadastro_aluno/conexao.php';

//EXIBIR POSTAGEM NA TELA:
//query mysql
$sql = "SELECT * FROM tbcadastroaluno";

//Variável que retorna o resultado de execução
$resultados = mysqli_query($conexao, $sql);


//Laço de repetição para dar um print de cada item do array
while($resultado = mysqli_fetch_array($resultados)): ?>


<!-- RESULTADO DO CADASTRO -->
<div class="postagem"> 

    <table>
        <thead>
<tr class="cabecalhotabela">
    <td>Matrícula</td>
    <td>Nome e Sobrenome</td>
    <td>Curso</td>
    <td>Disciplina</td>
    <td></td>
</tr>
</thead>
<tbody>
<tr>
    <td><?= $resultado['matricula'] ?></td>
    <td><?= $resultado['nome'] ?></td>
    <td><?= $resultado['curso'] ?></td>
    <td><?= $resultado['disciplina'] ?></td><br>
    <td> <?php echo "<div class='botaoapagar'><a href='apagar_aluno.php?id=" . $resultado['id'] . "'>Apagar</a><br><hr></div>";  ?></td>
    </tr>
  
</tbody>
</table>


</div>
<?php endwhile; ?>









</body>
</html>
