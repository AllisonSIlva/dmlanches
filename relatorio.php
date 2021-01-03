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
		<h1 id="fonte">Relatório de vendas:</h1>
		
        
        <br><br>
        <?php 
        $user = $_SESSION['userlogin'];
        if ($user == 'gerente'){
            $sql3 = "SELECT MAX(semana) as semana FROM registro_semana";
            $result3 = mysqli_query($conexao,$sql3);
            $row = mysqli_fetch_object($result3);
            $numero = $row->semana;
            
        ?>
        <h2>Semana <?php echo 1 + @$numero; ?></h2>
		<table class='table'>
                <th>Valor da Venda</th>
                <th>Data / Hora</th>
                <?php
                    $sql2 = "SELECT * FROM pedido";
                    $result2 = mysqli_query($conexao,$sql2);
                    foreach($result2 as $produto){
                        @$total += $produto['total'];
                        $_SESSION['totalsemana'] = $total;
                ?>
                <tr>
                    <td><?=$produto['total']?></td>
                    <td><?=$produto['hora']?></td>
                   
                    <?php } ?>
                </tr>
            </table>
            <h2>Faturamento da semana: R$<?=@$total?></h2> <a href="finalizar_semana.php" class='btn btn-success'>Finalizar semana</a>
            <br><br><a href="relatorio_semanal.php" class='btn btn-info'>Ver relatório semanal</a>
            <?php }else { ?>

            <h1 id="fonte1">Você não tem permissão para acessar esta página</h1>
            <?php } ?>
    <br><br><a href="index.php"><button type="button" class="btn btn-primary">Inicio</button></a>

	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
