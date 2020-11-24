<?php

//session_start ();
include_once("home.php");


$pesquisar = $_POST['pesquisar'];
$result_pesquisa = "SELECT * FROM estrutura_escrita WHERE  matricula='$pesquisar' OR titulo='$pesquisar'";
$resultado_pesquisas = mysqli_query($conexao, $result_pesquisa);


while($rows_pesquisas = mysqli_fetch_array($resultado_pesquisas)) {
    
    echo "<div class=\"resultado\">";
    echo "<h1> Resultado Pesquisa: </h1><br>";
    echo '<strong> Matricula:</strong> '.$rows_pesquisas['matricula']."<br>";
    echo '<strong>Nome: </strong> '.$rows_pesquisas['nome']."<br>";
    echo '<strong>Título: </strong>'.$rows_pesquisas['titulo']."<br>";
    echo '<strong> ID:</strong> '.$rows_pesquisas['id']."<br>";
    echo '<strong>Resumo: </strong> '.$rows_pesquisas['resumo']."<br><hr><br>";
    echo '<strong>Introdução: </strong>'.$rows_pesquisas['introducao']."<br>";
    echo '<strong>Referência Teórica: </strong>'.$rows_pesquisas['referenciaTeorica']."<br>";
    echo '<strong>Metodologia: </strong>'.$rows_pesquisas['metodologia']."<br>";
    echo '<strong>Análise: </strong>'.$rows_pesquisas['analise']."<br>";
    echo '<strong>Conclusão: </strong>'.$rows_pesquisas['conclusao']."<br>";
    echo '<strong>Referência Biografica: </strong>'.$rows_pesquisas['referenciaBiografica']."<br><br><br>";
    echo "</div>";

}


?>