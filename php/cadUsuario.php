<?php 
session_start();

include_once("../conexao.php");

if(isset($_SESSION['email'])){

  $rs = $conn-> prepare("SELECT nm_usuario, nivel_acesso FROM tb_usuario where nm_email = '". $_SESSION['email']."' ");

  $rs->execute();
  $row = $rs->fetch();
  echo $row['nivel_acesso'];


}
 else {
  echo " <script>	window.alert('Acesso não permitido'); window.location.href='../index.php'; </script>";	
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CADASTRO DE USUARIO</title>
    
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/styles.css">

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

            <li class="nav_item"> <a href="cadCliente.php" class="link">Clientes</a> </li>
            <li class="nav_item"> <a href="cadUsuario.php" class="link">Usuários</a> </li>
            <li class="nav_item"> <a href="cadFuncionario.php" class="link">Funcionários</a> </li>
            <li class="nav_item"> <a href="cadFornecedor.php" class="link">Forncedores</a> </li>  
            <li class="nav_item"> <a href="cadProduto.php" class="link">Produtos</a> </li>          
          </ul>
        </nav>
    
        <ion-icon name="menu-outline" class="toggle" id="toggle-menu"> </ion-icon>
    
      </header>

<section class="container">
  
<label class="page-title">CADASTRAR USUÁRIO</label>
  
  <div class="cad-usuario">
  <form method="POST" class="form">

   <legend>Insira os dados</legend>

    <label class="form-label">NOME COMPLETO:</label>
    <input type="text" class="form-value" id="nome" name="nome" required> <br>

    <label class="form-label">CARGO:</label>
    <select name="cargo" id="cargo">
      <option></option>
      <option value="0">Administrador</option>
      <option value="1">Desenvolvedor</option>
    </select>
    <br/>

    <label class="form-label">EMAIL:</label>
    <input type="email" class="form-value" id="email" name="email" required><br>

    <label class="form-label">SENHA:</label>
    <input type="password" class="form-value" id="senha" name="senha" required> <br>

    <label class="form-label">FOTO:</label>
    <input type="file" accept="image/*" class="form-value" id="image" name="imageUser"><br>

    <div class="btns">
    <input type="reset" value="Limpar" class="btn1"> <br>
    <input type="submit" value="Cadastrar" class="btn2"> <br>
    <?php
       if($row['nivel_acesso'] == 1 ) {?>
    <a href="consultUsuario.php"><input type="button" value="Consultar" class="btn3"></a>
    <?php } ?>
    </div>
   </form>
    
  </div>
</section>
    


<?php 


if(!empty($_POST)) {

   $nome = $_POST['nome'];
   $cargo = intval($_POST['cargo']);
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
    
  $stmt = $conn->prepare("INSERT INTO tb_usuario ( nm_usuario, nm_email, nm_senha, nivel_acesso, img_usuario)
                                          VALUES (:nome, :email, :senha, :cargo, :imagem);");

  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':cargo', $cargo);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':senha', $senha);
  $stmt->bindParam(':imagem', $caminhoIMG);
  
  $stmt->execute();

  echo "<script>alert('Cadastrado no banco de dados com sucesso!');</script>";

} catch(PDOException $e) {
  echo "Erro ao cadastrar no banco de dados: " . $e->getMessage();
  echo " <br/> teste </br>";
  echo $cargo;
}


}



?> 

  </body>
</html>

<!-- alterações
sair 
menu 
cadUser
conex 
consultUser
index
createTableUsuario -->