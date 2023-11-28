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
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CADASTRO DE PRODUTO</title>
    
   
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
            
            <ul class="nav_list">
          <li class="nav_item"> <a href="sair.php" class="link">Sair</a> </li> 
          </ul>
          </ul>
        </nav>
    
        <ion-icon name="menu-outline" class="toggle" id="toggle-menu"> </ion-icon>
    
      </header>

<section class="container">
  
<label class="page-title">CADASTRAR PRODUTO</label>
  
  <div class="cad-produto">
  <form method="POST" class="form">

   <legend>Insira os dados</legend>

    <label class="form-label">NOME:</label>
    <input type="text" class="form-value" id="nome" name="nome" required> <br>

    <label class="title"> Características </label> <br>
    <label class="form-label">COR:</label>
    <input type="text" class="form-value" id="cor" name="cor" required> 

    <label class="form-label">PESO:</label>
    <input type="decimal" class="form-value" id="peso" name="peso" required> <br>

    <label class="form-label">MATERIAL:</label>
    <input type="text" class="form-value" id="material" name="material" required>

    <label class="form-label">QUANTIDADE:</label>
    <input type="number" class="form-value" id="quantidade" name="quantidade" required> <br>

    <label class="form-label">CATEGORIA:</label>
    <input type="text" class="form-value" id="tipo" name="tipo" required>

    <label class="form-label">FORNECEDOR:</label>
    <input type="text" class="form-value" id="fornecedor" name="fornecedor" required> <br>

    <label class="form-label">PREÇO:</label>
    <input type="decimal" step="0.010" class="form-value" id="preco" name="preco" required>

    <label class="form-label">CUSTO:</label>
    <input type="decimal" step="0.010" class="form-value" id="custo" name="custo" required> <br>

    <label class="form-label">FOTO:</label>
    <input type="file" accept="image/*" class="form-value" id="image" name="imageProduto"><br>

    <div class="btns">
    <input type="reset" value="Limpar" class="btn1"> <br>
    <input type="submit" value="Cadastrar" class="btn2"> <br>
    <a href="/php/consultProduto.php"><input type="button" value="Consultar" class="btn3"></a>
    </div>
   </form>
    
  </div>
</section>
    


<?php 

if(!empty($_POST)) {

   $nome = $_POST['nome'];
   $cor = $_POST['cor'];
   $peso = $_POST['peso'];
   $material = $_POST['material'];
   $quantidade = $_POST['quantidade'];
   $tipo = $_POST['tipo'];
   $fornecedor = $_POST['fornecedor'];
   $preco = $_POST['preco'];
   $custo = $_POST['custo'];

 $image = $_FILES['imageProduto'];
 $dir = "/imgs/produtos/";

 date_default_timezone_set('America/Sao_Paulo');

 $extensao = strtolower(substr($image['name'], -4));

 $new_name = date("Y.m.d-H.i.s") . $extensao;

 move_uploaded_file($imagem['tmp_name'], $dir.$new_name);

include_once('../conexao.php');

try {
  
  $stmt = $conn->prepare("INSERT INTO tb_produto (nm_produto, nm_cor, vl_peso, nm_material, nr_quantidade, nm_categoria, vl_produto, vl_custo, img_produto)
                         VALUES (:nome, :cor, :peso, :material, :quantidade, :tipo, :preco, :custo, :imagem)");

  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':cor', $cor);
  $stmt->bindParam(':peso', $peso);
  $stmt->bindParam(':material', $material);
  $stmt->bindParam(':quantidade', $quantidade);
  $stmt->bindParam(':tipo', $tipo);
  $stmt->bindParam(':preco', $preco);
  $stmt->bindParam(':custo', $custo);
  $stmt->bindParam(':imagem', $caminhoIMG);
  
  $stmt->execute();

  echo "<script>alert('Cadastrado no banco de dados com Sucesso'); window.location.href='consultProduto.php';</script>";

} catch(PDOException $e) {
  echo "Erro ao cadastrar no banco de dados: " . $e->getMessage();
}
$conn = null;
}


?> 

  </body>
</html>