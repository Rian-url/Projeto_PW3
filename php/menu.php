<?php 
session_start();

include_once("../conexao.php");

if(isset($_SESSION['email'])){

  $rs = $conn-> prepare("SELECT nm_usuario, nivel_acesso FROM tb_usuario where nm_email = '". $_SESSION['email']."' ");

  $rs->execute();
  $row = $rs->fetch();

  // echo $_SESSION['email'] ;

}
 else {
  echo " <script>	window.alert('Acesso não permitido'); window.location.href='../index.php'; </script>";	
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/menu.css">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>

    <header>
    
    
        <nav class="nav" id="nav_menu">
    
          <ion-icon name="close-outline" class="close" id="close-menu"></ion-icon>
    
          <ul class="nav_list">
            <li class="nav_item"> <a href="menu.php" class="link">Home</a> </li>

            <li class="nav_item"> <a href="cadCliente.php" class="link">Clientes</a> </li>
            <li class="nav_item"> <a href="cadUsuario.php" class="link">Usuários</a> </li>
            <li class="nav_item"> <a href="cadFuncionario.php" class="link">Funcionários</a> </li>
            <li class="nav_item"> <a href="cadFornecedor.php" class="link">Forncedores</a> </li>  
            <li class="nav_item"> <a href="cadProduto.php" class="link">Produtos</a> </li>          
          </ul>
 
          <ul class="nav_list">
          <li class="nav_item"> <a href="sair.php" class="link">Sair</a> </li> 
          </ul>
          
        </nav>
    
        <ion-icon name="menu-outline" class="toggle" id="toggle-menu"> </ion-icon>
    
      </header>

      <mian>
        <div class="containeer">
          <div class="btn-group-vertical btn-group" role="group" aria-label="Vertical button group">
            <a href="../../config/createDB.php"><button type="button" class="btn btn-primary">Criar BD</button> </a>
            <a href="../../config/createTableCliente.php"><button type="button" class="btn btn-primary">Criar tabela cliente</button> </a>
            <a href="../../config/createTableFornecedor.php"><button type="button" class="btn btn-primary">Criar tabela fornecedor</button> </a>
            <a href="../../config/createTableFuncionario.php"><button type="button" class="btn btn-primary">Criar tabela funionário</button> </a>
            <a href="../../config/createTableProduto.php"><button type="button" class="btn btn-primary">Criar tabela produto</button> </a>
            <a href="../../config/createTableUsuario.php"><button type="button" class="btn btn-primary">Criar tabela usuário</button> </a>
           </div>
         </div>
      </main>
    
<script src="./js/main.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>


