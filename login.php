<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
</head>
<link href="style.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="shortcut icon" href="https://www.themes.pizza/wp-content/uploads/2018/02/pizza-favicon.png"><body>
	<div align="center">
		<div id="logo" align="center">
			<h1 id="nomelogo">DM Lanches</h1>
		</div>
	
	</div>
	<div id="loginpage">
		<h1 id="fonte">Login</h1>
		<form action="login.php" method="POST"> 
			<p><input type="text" name="userlogin" maxlength="20" size="30" placeholder="Usuário" class="form-control" id="loginpage"></p>
			<p><input type="Password" name="senhalogin" maxlength="15" size="30" placeholder="Senha" id="loginpage"></p>		
			<input type="submit" name="entrar" value="Entrar" id="loginpage">
		</form>
		
	
	<?php
	session_start();
	include "conexao.php";
	
	@$usuario = $_POST['userlogin'];
	@$senha = md5($_POST['senhalogin']);

	$query = "SELECT funcionario, senha FROM funcionarios WHERE funcionario = '$usuario' AND senha = '$senha'";
	$result = mysqli_query($conexao,$query);
	$linhas = mysqli_num_rows($result);
	@$sessaoerror = $_SESSION['naologado'];
	
	if($linhas == 1){
		header('location: index.php');
		$_SESSION['userlogin'] = $usuario;
	}
	else{
		$_SESSION['naologado'] = true;
		
	}
	mysqli_close($conexao);
	if($linhas != 1){
		echo " <h4 id = fonte1> Usuário ou senha invalidos.</h4>";
	}
	?>
<br><a href="index.php"><button type="button" class="btn btn-primary">Inicio</button></a>

</div>

</body>
</html>
