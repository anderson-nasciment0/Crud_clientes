<?php 
session_start();
//faz a conexão
require 'conexao.php';
//Dados do formulário
$campoCliente = $_POST["Cliente"];
$campoCodigo = $_POST["Numero_container"];
$campoTipo = $_POST["Tipo"];
$campoStatus = $_POST["Status"];
$campoCategoria = $_POST["Categoria"];

$sql = "INSERT INTO container(Cliente, Numero_container, Tipo, Status, Categoria)VALUES('$campoCliente', '$campoCodigo', '$campoTipo', '$campoStatus', '$campoCategoria')";

//Executa o sql e faz tratamento de errors
if ($conn->query($sql) === TRUE){
    header( "refresh:2;url=index.php" );	
    echo "Container gravado com sucesso.";

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