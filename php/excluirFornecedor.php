
<?php

$cod = $_GET['id'];

include_once('../conexao.php');

	try 
	{
		   
		$delete = $conn->prepare("DELETE FROM tb_fornecedor WHERE cd_fornecedor = $cod;");
		$delete->execute();
		echo "<script>alert('Deletado no banco de dados com sucesso!');</script>";
	} 
	catch(PDOException $e) 
	{
		echo 'ERROR: ' . $e->getMessage();
	}

	
 ?>

 
<button onclick="window.location.href='consultFornecedor.php'">Voltar</button>