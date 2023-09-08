<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
	
	<br>
		<div class="row">
			<div class="col"></div>
			<div class="col-6">
          <h1 class="text-center bg-success text-white">CONSULTA PRODUTO</h1>
					<?php
             include_once('../conexao.php');
             try 
             {	   
               $select = $conn->prepare('SELECT * FROM tb_produto');
               $select->execute();
               
               while($row = $select->fetch()) 
               {		
                 echo "<p>";
                 echo "<br><img src='".$row['img_produto']."' width=80px>";
                 echo "<br><b>Codigo: </b>".$row['cd_produto'];
                 echo "<br><b>Nome: </b>".$row['nm_produto'];
                 echo "<br><b>Cor: </b>".$row['nm_cor'];
                 echo "<br><b>Peso: </b>".$row['vl_peso'];
                 echo "<br><b>Material: </b>".$row['nm_material'];
                 echo "<br><b>Categoria: </b>".$row['nm_produto'];
                 echo "<br><b>Valor: </b>".$row['vl_produto'];
                 echo "<br><b>Custo: </b>".$row['vl_custo'];
                 echo "<hr>";
               }
             } 
             catch(PDOException $e) 
             {
               echo 'ERROR: ' . $e->getMessage();
             }
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
