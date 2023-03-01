<?php
session_start();

//Dados do formulário
$campoId = $_POST["Id"];
$campoCliente = $_POST["Cliente"];
$campoNumero = $_POST["Numero_container"];
$campoTipo = $_POST["Tipo"];
$campoStatus = $_POST["Status"];
$campoCategoria= $_POST["Categoria"];

//Faz a conexão com o BD.
include_once 'conexao.php';
//Sql que altera um registro da tabela usuários
 $sql = "UPDATE container SET Cliente='" . $campoCliente . "', Numero_container='" . $campoNumero . "', Tipo='" . $campoTipo . "', Status='" . $campoStatus . "', Categoria='" . $campoCategoria . "' WHERE Id=" . $campoId;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  header( "refresh:2;url=index.php" );	
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