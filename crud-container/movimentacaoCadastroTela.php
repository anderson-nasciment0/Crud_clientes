<?php
session_start();
include_once "conexao.php";
$sql = "SELECT Id, Cliente FROM container";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/telaMovimento.css">
    <title>Cadastro do movimento</title>
</head>
<body>
    <h1>Adicionar movimento</h1>   
    <form action="cadastroMovimento.php" method="post"> 
        <label for="Cliente">Selecione o cliente para movimentação</label>
        <select name='Idcliente' id="Cliente">
            <option value="Selecione" selected>Selecione...</option>
            <?php 
            
            while($dados = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $dados['Id']?>">
                <?php echo $dados['Cliente']?>
            </option>
            <?php
            }
            ?>
        </select>
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
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>