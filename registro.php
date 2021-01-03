<!DOCTYPE html>
<html>
<head>
	<title> Adicionar novo item</title>
	<meta charset="utf-8">
</head>
<link href="style.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="shortcut icon" href="https://www.themes.pizza/wp-content/uploads/2018/02/pizza-favicon.png">
<body>
	<div align="center">
		<div id="logo" align="center">
			<h1 id="nomelogo">DM Lanches</h1>
		</div>
		<br>
		
	</div>
		<div id="loginpage">
		<?php 
			session_start();
			include 'conexao.php';
			$user = $_SESSION['userlogin'];
			if ($user == 'gerente'){
		
		?>
		<h1 id="fonte">Adicionar novo item:</h1>
		<form action="registro.php" method="post">
			<fieldset>
				<legend><b>Nome do item</b></legend>
						<input type="text" name="nome" maxlength="120" size="30" placeholder="Nome" class="form-control" id="loginpage" required></input>
			</fieldset>
			<fieldset>
				<legend><b>Preço do item</b></legend>
						<input type="number" name="preco" maxlength="9" size="30" placeholder="Preço" class="form-control" step = ".01" id="loginpage"></input>
			</fieldset>
						<br><input type="submit" id="loginpage">
		</form>
		<?php } else{ ?>
			<h1 id='fonte1'>Você não tem permissão para adicionar um novo item.</h1>
		<?php } ?>
		<br><a href="index.php"><button type="button" class="btn btn-primary">Inicio</button></a>
	<p>
	<?php
	
		$nome ;
		$preco;
		$regex;
		
		if(isset($_POST['nome']) && isset($_POST['preco'])){
			@$nome = $_POST['nome'];
			@$preco = $_POST['preco'];
			$regex = preg_match("/^[0-9.']*$/", $preco);
			if($regex){
				$sql = "INSERT INTO itens VALUES (null,'$nome','$preco')";
				mysqli_query($conexao,$sql);
				mysqli_close($conexao);
				echo "<script>alert('Item adicionado.')</script>";
			}
			else{
				echo "<h4 id=fonte1>Digite apenas números no preço.Casa decimal é dividida por ponto(.).</h4>";
			}
		}
		
	?>
	</p>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
