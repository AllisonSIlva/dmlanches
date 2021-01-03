<?php
    session_start();    
    include "conexao.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title> Vendas</title>
	<meta charset="utf-8">
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="style.css" type="text/css" rel="stylesheet">
<link rel="shortcut icon" href="https://www.themes.pizza/wp-content/uploads/2018/02/pizza-favicon.png">
<body>
	<div align="center">
		<div id="logo" align="center">
			<h1 id="nomelogo">DM Lanches</h1>
		</div>
		<br>
		
	</div>
		<div id="loginpage">
		<h1 id="fonte">Registrar uma venda:</h1>
		<form action = "processo_vendas.php" method="POST">
        <h3 id ='fonte'>Itens:</h3>
            <select name="codigo"  id="loginpage">
                <?php
                    $itens;
                    $contador = 0;
                    $sql = "SELECT * FROM itens";
                    $item = mysqli_query($conexao,$sql);
                    while($nome = mysqli_fetch_array($item)){
                        echo "<option value = '".$nome['codigo']."'>".$nome['Nome']."</option>";
                    }
                    
                ?>    
            </select>        
            <input type="number"required name="quantidade" maxlength="9" size="30" placeholder="Quantidade" id="loginpage"></input>
           <input type="submit" name="entrar" value="Adicionar" id="loginpage">
                      
        </form>
        
        <br><br>
		<table class='table'>
                <th>Item</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th></th>
                <?php
                    $sql2 = "SELECT * FROM itens_pedido";
                    $result2 = mysqli_query($conexao,$sql2);
                    foreach($result2 as $produto){
                        @$subtotal = $produto['preco'] * $produto['quantidade'];
                        @$total += $subtotal;
                        $_SESSION['total'] = $total;
                ?>
                <tr>
                    <td><?=$produto['item']?></td>
                    <td><?=$produto['quantidade']?></td>
                    <td><?=$produto['preco']?></td>
                    <td><a class="btn btn-outline-danger" href="remover_item.php?id=<?=$produto['id']?>" onclick ="alert('Remover item?')">Remover</a></td>

                    <?php } ?>
                </tr>
            </table>
            <h2>Total: R$<?=@$total?></h2> <a href="finalizar.php" class='btn btn-success'>Finalizar pedido</a>
    <br><br><a href="index.php"><button type="button" class="btn btn-primary">Inicio</button></a>

	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
