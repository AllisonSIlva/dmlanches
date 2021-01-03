<?php
	session_start();
	include "conexao.php";
	if (@$_SESSION['userlogin'] == 'gerente'){

	$id = $_GET['id'];
	$query = "DELETE FROM `itens` WHERE `itens`.`codigo` = " . $id;
	$result = mysqli_query($conexao,$query);
	echo json_encode($result);
	header('location: produtos.php');
	}
?>