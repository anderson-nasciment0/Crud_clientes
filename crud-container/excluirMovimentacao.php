<?php 
session_start();
//Faz a leitura do dado passado pelo link.
$campoId = $_GET["Id"];
include_once 'conexao.php';

//Apaga da tabela o Container registrado
$sql = "DELETE FROM container_movements WHERE Id=$campoId";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
   header('Location: movimentacao.php'); //Redireciona para o controle 
   
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