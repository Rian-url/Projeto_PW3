<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CADASTRO DE USUARIO</title>
    
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/usuario.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    

  </head>
  <body>

  <header>
        <div class="logo">
          <img src="" alt="" srcset="">
        </div>
    
        <nav class="nav" id="nav_menu">
    
          <ion-icon name="close-outline" class="close" id="close-menu"></ion-icon>
    
          <ul class="nav_list">
            <li class="nav_item"> <a href="./menu.php" class="link">Home</a> </li>

            <li class="nav_item"> <a href="/php/cadCliente.php" class="link">Clientes</a> </li>
            <li class="nav_item"> <a href="/php/cadUsuario.php" class="link">Usuários</a> </li>
            <li class="nav_item"> <a href="/php/cadFuncionario.php" class="link">Funcionários</a> </li>
            <li class="nav_item"> <a href="/php/cadFornecedor.php" class="link">Forncedores</a> </li>  
            <li class="nav_item"> <a href="/php/cadProduto.php" class="link">Produtos</a> </li>          
          </ul>
        </nav>
    
        <ion-icon name="menu-outline" class="toggle" id="toggle-menu"> </ion-icon>
    
      </header>

<section class="container">
  
<label class="page-title">CADASTRAR USUÁRIO</label>
  
  <div class="cad">
   <form method="POST" class="form">
    <label class="form-label">NOME COMPLETO:</label> <br>
    <input type="text" class="form-value" id="nome" name="nome"> <br>
    <label class="form-label">EMAIL:</label>
    <input type="email" class="form-value" id="email" name="email"><br>
    <label class="form-label">SENHA:</label>
    <input type="password" class="form-value" id="senha" name="senha">
    <label class="form-label">FOTO:</label>
    <input type="file" accept="image/*" class="form-value" id="image" name="imageUser"><br>

    <div class="btns">
    <input type="reset" value="Limpar" class="btn1"> <br>
    <input type="submit" value="Cadastrar" class="btn2"> <br>
    <a href="consultUsuario.php"><input type="button" value="Consultar" class="btn3"></a>
    </div>
   </form>
    
  </div>
</section>
    


<?php 

if(!empty($_POST)) {

   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $senha = $_POST['senha'];

  $imagem = $_FILES['imageUser'];
  $dir = "imgs/usuarios/";

  date_default_timezone_set('America/Sao_Paulo');

  $extensao = strtolower(substr($imagem['name'], -4));

  $new_name = date("Y.m.d-H.i.s") . $extensao;

  move_uploaded_file($imagem['tmp_name'], $dir.$new_name);

  $caminhoIMG = $dir.$new_name;

  include_once('../conexao.php');

 try {
    
  $stmt = $conn->prepare("INSERT INTO tb_usuario ( nm_usuario, nm_email, nm_senha, img_usuario)
                                          VALUES (:nome, :email, :senha, :imagem);");

  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':senha', $senha);
  $stmt->bindParam(':imagem', $caminhoIMG);
  
  $stmt->execute();

  echo "<script>alert('Cadastrado no banco de dados com sucesso!');</script>";

} catch(PDOException $e) {
  echo "Erro ao cadastrar no banco de dados: " . $e->getMessage();
}


}



?> 

  </body>
</html>