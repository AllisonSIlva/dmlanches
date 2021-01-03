<?php 
	session_start();
    include 'conexao.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM itens WHERE codigo = ". $id;
    echo $query;
    $sql = "UPDATE itens SET Nome = 'juca', Preço = '' WHERE codigo = $id";
    $result = mysqli_query($conexao,$query);
    foreach($result as $p):
?>

<!DOCTYPE html>
<html>
<head>
	<title> Atualizar item</title>
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
		<h1 id="fonte">Atualizar item:</h1>
		<form action="processo_atualizar.php" method="post">
			<fieldset>
				<legend><b>Nome do item</b></legend>
                    <input type="hidden" name="id" value = "<?php echo $p['codigo']; ?>" class="form-control" id="loginpage" required></p>
                    <input type="text" name="nome" value = "<?php echo $p['Nome']; ?>" maxlength="120" size="30" placeholder="Nome" class="form-control" id="loginpage" required></p>
			</fieldset>
			<fieldset>
				<legend><b>Preço do item</b></legend>
						<input type="number" name="preco" value = "<?php echo $p['Preço']; ?>" maxlength="9" size="30" placeholder="Preço" class="form-control" step = ".01" id="loginpage"></p>
			</fieldset>
						<br><input type="submit" id="loginpage">
		</form>
		
	<p>
	<?php
        endforeach;
    	mysqli_close($conexao);
			
		
	?>
	</p>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
