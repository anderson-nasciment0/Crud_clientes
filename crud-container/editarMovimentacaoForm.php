<?php 
session_start();
$campoId = $_GET["Id"];
include_once "conexao.php";
//Consulta o SQL
$sql = "SELECT * FROM container_movements WHERE Id= $campoId";

//Executa o SQL
$result = $conn->query($sql);
$movimentacao_data = $result->fetch_assoc()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/telaMovimento.css">
    <title>Editar movimento</title>
</head>
<body>
<h1>Editar a movimentação </h1>

<form action="editarMovimento.php" method="post">
<input type="hidden" name="Id" value="<?php echo $movimentacao_data["Id"]; ?>">
    <label for="mov">Movimentação para:</label>
	<select  name="Tipo" id="mov">
		<option value="Embarque">Embarque</option>
        <option value="Gate-in">Gate-in</option>
        <option value="Gate-out">Gate-out</option>
        <option value="Reposicionamento">Reposicionamento</option>
        <option value="Pesagem">pesagem</option>
        <option value="Scanner">Scanner</option>
	</select>
    <div class="data">
    <div>
    <label for="fim">Inicio</label>
    <input type="date" name="Inicio" required>
    </div>
    <div>   
    <label for="fim">Fim</label>
    <input type="date" name="Fim" required>
    </div>
</div>

    <input type="submit" value="Alterar">
</form>
</body>
</html>