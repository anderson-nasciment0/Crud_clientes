<?php 
session_start();
//faz a conexão
require 'conexao.php';
//Dados do formulário
$campoCliente = $_POST["Idcliente"];
$campoTipo = $_POST["Tipo"];
$campoInicio = $_POST["Inicio"];
$campoFim= $_POST["Fim"];

$sql = "INSERT INTO container_movements(Idcliente, Tipo, Inicio, Fim)VALUES('$campoCliente','$campoTipo', '$campoInicio', '$campoFim')";

//Executa o sql e faz tratamento de errors
if ($conn->query($sql) === TRUE){
    header( "refresh:2;url=movimentacao.php" );	
    echo "Movimento gravado com sucesso.";

     //Abre o arquivo log.txt, a opção "a" é para adicionar 
  $armazenar = fopen("log.txt", "a") or die("Não abriu");
  
  //Como será a String gravada no log
  $txt =  " - $sql - " . 
  date("d/m/Y") . " - " . date("H:i:s") . "\n";

  //Escreve a String no objeto que representa o arquivo
  fwrite($armazenar, $txt);
  
  //Fecha o objeto
  fclose($armazenar);
}else{
    header("refresh: 5;url=containerCadastrotela.php");
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//Fecha a conexão
$conn->close();


  
?>