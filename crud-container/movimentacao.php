<?php 
session_start();
include_once "conexao.php";
//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM container_movements ORDER BY Id ";
//Executa o SQL
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/inicio.css">
    <title>Crud movimentos</title>
</head>
<body>
    <?php 
    include 'menu.php';
    ?>
    <table>
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Id do Cliente</th>
                <th scope="col">Movimentação</th>
                <th scope="col">Inicio</th>
                <th scope="col">Fim</th>
                <th scope="col" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while($movimentacao_data = mysqli_fetch_assoc($result))
            {
                echo "<tr>
                <td>" .$movimentacao_data['Id']."</td>
                <td>" . $movimentacao_data['Idcliente'] ."</td>
                <td>" .$movimentacao_data['Tipo']."</td>
                <td>" .$movimentacao_data['Inicio']."</td>
                <td>" .$movimentacao_data['Fim']."</td>";
		        echo "<td><a href='editarMovimentacaoForm.php?Id=" . $movimentacao_data["Id"] . "'><img src='./images/alterar.png' style='width:40px;' alt='Editar'></a></td><td><a href='excluirMovimentacao.php?Id=" . $movimentacao_data["Id"] . "'><img src='./images/excluir.png' style='width:40px;' alt='Excluir '></a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
            <a href="movimentacaoCadastroTela.php"><img src="./images/adicionar.png" style="width: 40px" alt="Adicionar Movimento"></a>
</div>
</body>
</html>