<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
	
	<br>
		<div class="row">
			<div class="col"></div>
			<div class="col-6">
          <h1 class="text-center bg-success text-white">CONSULTA CLIENTE</h1>
					<?php
             include_once('conexao.php');
             try 
             {	   
               $select = $conn->prepare('SELECT * FROM tb_cliente');
               $select->execute();
               
               while($row = $select->fetch()) 
               {		
                 echo "<p>";
                 echo "<br><img src='".$row['img_cliente']."' width=80px>";
                 echo "<br><b>Codigo: </b>".$row['cd_cliente'];
                 echo "<br><b>Nome: </b>".$row['nm_cliente'];
                 echo "<br><b>CPF: </b>".$row['cpf_cliente'];
                 echo "<br><b>RG: </b>".$row['rg_cliente '];
                 echo "<br><b>CEP: </b>".$row['cep_cliente'];
                 echo "<br><b>Celular: </b>".$row['tl_cliente'];
                 echo "<br><b>Email: </b>".$row['nm_email '];
                 echo "<hr>";
               }
             } 
             catch(PDOException $e) 
             {
               echo 'ERROR: ' . $e->getMessage();
             }
            ?>
          ?>
			</div>
			<div class="col"></div>
		</div>
		<div class="text-center">
            <br>
			<button type="button" class="btn btn-success" onclick="javascript:location.href ='menu.php';">Voltar</button>
		</div>
	</div>
  </body>
</html>
