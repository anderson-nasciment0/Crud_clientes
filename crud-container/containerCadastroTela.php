<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/telaContainer.css">
    <title>Cadastro do Container</title>
</head>
<body>
    <h1>Adicionar novo container</h1>

    <form action="cadastroContainer.php" method="post">
        <input type="text" name="Cliente" placeholder="Insira o cliente" required>
        <input type="text" name="Numero_container" placeholder="Código" pattern="[A-Z]{4}[0-9]{7}" title="O  código deve conter 4 letras maiusculas e 7 numeros" required>
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
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>