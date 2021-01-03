<?php 
    session_start();
    include "conexao.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title> DM Lanches</title>
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
                if (@$_SESSION['userlogin'] == 'funcionario' || @$_SESSION['userlogin'] == 'gerente'){
            ?>
            <div align='center'>
            <h2>Entrou como: <?php echo $_SESSION['userlogin']; ?></h2> 
            <a href='login.php'><button class='btn btn-primary'>Trocar Usuário</button></a>
            </div>
            <h1>Registrar venda </h1>
            <a href="vendas.php"><button type="button" class="btn btn-primary">Nova venda</button></a><br>
            <h1>Produtos da loja </h1>
            <a href="produtos.php"><button type="button" class="btn btn-primary">Ver itens da loja</button></a><br>
            <?php 
                if (@$_SESSION['userlogin'] == 'gerente'){
            ?>
            <h1>Relatório de vendas </h1>
            <a href="relatorio.php"><button type="button" class="btn btn-primary">Ver relatório</button></a><br>
            
            <?php }} else {?>
            <h1>Faça login primeiro: </h1><br>
            <a href='login.php'><button class='btn btn-primary'>Fazer Login</button></a>
            <?php } ?>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
