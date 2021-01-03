
	<?php
		session_start();
		include 'conexao.php';
		$nome = $_POST['nome'];
		$preco = $_POST['preco'];
		$id = $_POST['id'];
        
        
        $sql = "UPDATE itens SET Nome='$nome', Preço='$preco' WHERE codigo=$id ";
        $result = mysqli_query($conexao,$sql);
        if(mysqli_affected_rows($conexao)){
            header("location: produtos.php");
        }
		
	?>
	