<?php 
session_start();
include_once "conexao.php";
//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM container ORDER BY Id ";
$clientes_exp = "SELECT COUNT(*) as qnt_categoria from container where Categoria='Exportação'";
$clientes_imp = "SELECT COUNT(*) as qnt_categoria from container where Categoria='Importação'";
//Executa o SQL
$result = $conn->query($sql);
$result_export= $conn->query($clientes_exp);
$result_import= $conn->query($clientes_imp);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/inicio.css">d
    <title>Crud Container</title>
</head>
<body>
    <?php 
    include 'menu.php';
    ?>
  
    <table>
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col" onclick="sortTable(1)">Cliente</th>
                <th scope="col">Número do Container</th>
                <th scope="col">Tipo</th>
                <th scope="col">Status</th>
                <th scope="col">Categoria</th>
                <th scope="col" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while($container_data = mysqli_fetch_assoc($result))
            {
                echo "<tr>
                <td>" .$container_data['Id']."</td>
                <td>" .$container_data['Cliente']."</td>
                <td>" .$container_data['Numero_container']."</td>
                <td>" .$container_data['Tipo']."</td>
                <td>" .$container_data['Status']."</td>
                <td>" .$container_data['Categoria']."</td>";
		        echo "<td><a href='editarContainerForm.php?Id=" . $container_data["Id"] . "'><img src='./images/alterar.png'></a></td><td><a href='excluirContainer.php?Id=" . $container_data["Id"] . "'><img src='./images/excluir.png'></a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
            <a href="containerCadastroTela.php"><img src="./images/adicionar.png" ></a>
            <br>
            <div class="informacao">
            <?php 
             if($container_data = mysqli_fetch_assoc($result_export))
             {
                 echo "A quantidade de exportações totais é de: " . $container_data['qnt_categoria'] . '<br>';
             }
             if($container_data = mysqli_fetch_assoc($result_import))
             {
                 echo "A quantidade de importações totais é de: " . $container_data['qnt_categoria'];
             }
            ?> 
            </div>
</div>
</body>
</html>