<?php
	session_start();
?>
<!DOCTYPE html>
<head>
	<title>Nossos sabores!</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<link rel="shortcut icon" href="https://www.themes.pizza/wp-content/uploads/2018/02/pizza-favicon.png">
</head>
<body>
	<div align="center">
		<div id="logo" align="center">
			<h1 id="nomelogo">PizzaNet</h1>
		</div>
		<br>
		<hr>
		<header class="body1">
			<div class="container" id="div">
				<h2 class="icone">PIZZANET</h2>
				<nav>
						<ul>
							<li><a href="Pizza.php">Início</a></li>
							<li><a href="sabores.php">Pizzas</a></li>
							<li><a href="comprar.php">Comprar</a></li>
							<li><a href="sacola.php">Sacola</a></li>
							<li><a href="login.php">Logar-se</a></li>
							<li><a href="sair.php">Sair</a></li>
						</ul>
					</nav>
			</div>		
		</header>
		<hr>
		<h1 id="fonte">Pizzanet</h1>
		<h3 id="fonte"><b>Experimente a melhor pizza do mundo com desconto especial!<br>Peça já a sua!!!</h3>
		<hr>
	</div>
	<div id="loginpage">
		<form action="comprar.php" method="POST" id="comprar">
			<p id="fonte">Selecione o tamanho da pizza que você deseja:<select name="tamanho"  id="loginpage"><p>
					<option>---------</option>
					<option value="Pequena">Pequena</option>
					<option value="Media">Media</option>
					<option value="Grande">Grande</option>
					<option value="Gigante">Gigante</option>
				</select>
			<p id="fonte">Selecione o sabor da pizza que você deseja:<select name="sabor1"  id="loginpage">
					<option>------------</option>
					<option value="Frango">Frango</option>
					<option value="Calabresa">Calabresa</option>
					<option value="Franpiry">Franpiry</option>
					<option value="Portuguesa">Portuguesa</option>
					<option value="Baiana">Baiana</option>
					<option value="Caipira">Caipira</option>
					<option value="Atum">Atum</option>
					<option value="Chocolate">Chocolate</option>
				</select>

			<p id="fonte">Caso deseje uma pizza de dois sabores:<select name="sabor2"  id="loginpage">
					<option>------------</option>
					<option value="Frango">Frango</option>
					<option value="Calabresa">Calabresa</option>
					<option value="Franpiry">Franpiry</option>
					<option value="Portuguesa">Portuguesa</option>
					<option value="Baiana">Baiana</option>
					<option value="Caipira">Caipira</option>
					<option value="Atum">Atum</option>
					<option value="Chocolate">Chocolate</option>
				</select>
				<p id="fonte">Quantidade de pizzas:<select name="quantidade"  id="loginpage">
					<option>------------</option>
					<option value="1">Uma Pizza</option>
					<option value="2">Duas Pizzas</option>
					<option value="3">Três Pizzas</option>
					<option value="4">Quatro Pizzas</option>
					<option value="5">Cinco Pizzas</option>

				</select>
				<br>
				<input type="submit" name="entrar" value="Pedir" id="loginpage">
				<div align="center">
				<address>
					<h3 id="fonte">Caso deseje retirar a pizza:<br> <br> <iframe id="video" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2847.8127205446426!2d8.899019950738946!3d44.457511307964204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d34716787de991%3A0x5bc49dcb727ac7fd!2sPizzaneto!5e0!3m2!1spt-BR!2sbr!4v1592541456186!5m2!1spt-BR!2sbr" width="350" height="300" frameborder="1" style="border:3 ;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></h3>
				</address>
				
		</form>
		<?php
		$conexao = mysqli_connect('127.0.0.1',"root","","Pizzaria");
		if($_SESSION['userlogin'] == true){
            @$nomeuser = $_SESSION['userlogin'];
        }
		if(isset($_POST['tamanho'])	&&	isset($_POST['sabor1']) && isset($_POST['sabor2'])){
			$Ptamanho = $_POST['tamanho'];
			$Psabor1 = $_POST['sabor1'];
			$Psabor2 = $_POST['sabor2'];
			$quantidade = $_POST['quantidade'];
		}
	
		if(isset($_POST['tamanho'])	&&	isset($_POST['sabor1']) && isset($_POST['sabor2'])){
		$sql = "INSERT INTO pedidos VALUES ('$nomeuser','$Ptamanho','$Psabor1','$Psabor2')";
	
		mysqli_query($conexao,$sql);
		mysqli_close($conexao);
		$_SESSION['tamanho_pizza'] = $Ptamanho;
		$_SESSION['sabor1_pizza'] = $Psabor1;
		$_SESSION['sabor2_pizza'] = $Psabor2;
		$_SESSION['quantidade'] = $quantidade;
		}
		if(isset($quantidade)){
		header('location: sacola.php');
		}

		?>
	</div>
</body>
</html>
