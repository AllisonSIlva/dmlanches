<?php
	session_start();
	include "conexao.php";
	if (@$_SESSION['userlogin'] == 'gerente' || @$_SESSION['userlogin'] == 'funcionario'){

	$id = $_GET['id'];
	$query = "DELETE FROM `itens_pedido` WHERE `itens_pedido`.`id` = " . $id;
	$result = mysqli_query($conexao,$query);
	header('location: vendas.php');
	}
?>