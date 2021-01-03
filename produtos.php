<!DOCTYPE html>
<html>
<head>
	<title> DM Lanches - Produtos</title>
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
        <?php 
            session_start();
            include "conexao.php";
            $query = "SELECT * FROM itens";
            $result = mysqli_query($conexao,$query);
            
        ?>
	</div>
		<div id="loginpage">
            <h1>Produtos cadastrados:</h1><br><br>
            <a href="index.php"><button type="button" class="btn btn-primary">Inicio</button></a>

            <a href="registro.php"><button type="button" class="btn btn-primary">Adicionar novo item</button></a><br><br>

            <table class="table">
                <th>Item</th>
                <th>Preço</th>
                <th></th>
                <th></th>
                <?php foreach($result as $p): ?>
                <tr id="produto<?=$p['codigo']?>">
                    <td> <?php echo $p['Nome']; ?></td>
                    <td> <?php echo "R$". $p['Preço']; ?></td>
                    <?php 
                        if (@$_SESSION['userlogin'] == 'gerente'){
                    ?>
                    <td><a href = "atualizar.php?id=<?php echo $p['codigo'];?>"><button class="btn btn-outline-primary" onclick = "return confirm('Deseja alterar <?php echo $p['Nome']; ?>?')">Alterar</button></a></td>
                    <td><a class="btn btn-outline-danger"  onclick ="removerProduto('<?=$p['Nome']?>', <?=$p['codigo']?>);">Remover</a></td>
                    <?php } ?>
                </tr>

                <?php 
                    endforeach; 
                ?>
            </table>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script> 
    function removerProduto(nomeProduto, idProduto){
        if(confirm('Deseja remover ' + nomeProduto + '?')){
            var ajax = new XMLHttpRequest();
            ajax.responseType = "json";
            ajax.open("GET","remover.php?id=" + idProduto, true);
            ajax.send();
            ajax.addEventListener("readystatechange", function(){
                if(ajax.status === 200 && ajax.readyState === 4){
                    console.log(ajax.response)
                    var row = document.getElementById("produto"+<?=$p['codigo']?>);
                    row.parentNode.removeChild(row);

                }
            });
        }
    }
</script>

</html>
