<?php 
session_start();
$campoId = $_GET["Id"];
include_once "conexao.php";

//Consulta o SQL
$sql = "SELECT * FROM container WHERE Id= $campoId";

//Executa o SQL
$result = $conn->query($sql);
$container_data = $result->fetch_assoc()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/telaContainer.css">
    <title>Editar Container</title>
</head>
<body>
<h1>Editar o container</h1>

<form action="editarContainer.php" method="post">
    <input type="hidden" name="Id" value="<?php echo $container_data["Id"]; ?>">
    <input type="text" name="Cliente" placeholder="Insira o cliente" value="<?php echo $container_data["Cliente"]; ?>"required>
    <input type="text" name="Numero_container" placeholder="Sua senha..." pattern="[A-Z]{4}[0-9]{7}" title="O  código deve conter 4 letras maiúsculas e 7 numeros" value="<?php echo $container_data["Numero_container"]?>" required>
    <div class="selects">
    <div> 
        <label for="iest">Tipo</label> <select name="Tipo" id="iest">
        <option value="20">20 pés</option>
        <option value="40">40 pés</option>
    </select>
</div>
    <div><label for="stat">Status</label>
    <select name="Status" id="stat"> 
        <option value="Cheio">Cheio</option>
        <option value="Vazio">Vazio</option>
    </select>
</div>
    <div> 
        <label for="categ">Categoria</label>
    <select name="Categoria" id="categ">
        <option value="Importação">Importação</option>
        <option value="Exportação">Exportação</option>
    </select>
</div>
   </div>
    <input type="submit" value="Alterar">
</form>
</body>
</html>