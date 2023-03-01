<?php
session_start();

//Dados do formulário
$campoId = $_POST["Id"];
$campoTipo = $_POST["Tipo"];
$campoInicio = $_POST["Inicio"];
$campoFim= $_POST["Fim"];


include_once 'conexao.php';

 $sql = "UPDATE container_movements SET Tipo='" . $campoTipo . "', Inicio='" . $campoInicio . "', Fim='" . $campoFim . "' WHERE Id=" . $campoId;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  header( "refresh:2;url=movimentacao.php" );	
  echo "Registro atualizado.";

    //Abre o arquivo log.txt, a opção "a" é para adicionar 
    $armazenar = fopen("log.txt", "a") or die("Não abriu");
  
    //Como será a String gravada no log
    $txt =  " - $sql - " . 
    date("d/m/Y") . " - " . date("H:i:s") . "\n";
  
    //Escreve a String no objeto que representa o arquivo
    fwrite($armazenar, $txt);
    
    //Fecha o objeto
    fclose($armazenar);
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
	$conn->close();


?> 