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
    <title>CADASTRO DE FORNECEDORES</title>

    
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/styles.css">

    <script type="text/javascript" src="/js/buscaCEP.js"></script>
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

            <li class="nav_item"> <a href="/php/cadfuncionario.php" class="link">Clientes</a> </li>
            <li class="nav_item"> <a href="/php/cadUsuario.php" class="link">Usuários</a> </li>
            <li class="nav_item"> <a href="/php/cadFuncionario.php" class="link">Funcionários</a> </li>
            <li class="nav_item"> <a href="/php/cadFornecedor.php" class="link">Forncedores</a> </li>  
            <li class="nav_item"> <a href="/php/cadProduto.php" class="link">Produtos</a> </li>      
            
            <ul class="nav_list">
          <li class="nav_item"> <a href="sair.php" class="link">Sair</a> </li> 
          </ul>
          
          </ul>
        </nav>
    
        <ion-icon name="menu-outline" class="toggle" id="toggle-menu"> </ion-icon>
    
      </header>

<section class="container">

<label class="page-title">CADASTRAR FORNECEDOR</label>

  <div class="cad">
   <form method="POST" class="form">

    <legend>Insira os dados</legend>

    <label class="form-label">NOME COMPLETO:</label> 
    <input type="text" class="form-value" id="nome" name="nome"> <br>

    <label class="title"> Documentos </label> <br>
    <label class="form-label">CNPJ:</label>
    <input type="number" class="form-value" id="cnpj" name="cnpj">

    <label class="form-label">RG:</label>
    <input type="number" class="form-value" id="rg" name="rg"> <br>

    <label class="title"> Endereço comercial  </label> <br>
    <label class="form-label">CEP:</label>
    <input type="number" class="form-value" id="cep" name="cep" onblur="pesquisacep(this.value)">

    <label class="form-label">CIDADE:</label>
    <input type="text" class="form-value" id="cidade" name="cidade">

    <label class="form-label">ESTADO:</label>
    <input type="text" class="form-value" id="uf" name="estado"> <br>

    <label class="form-label">RUA:</label>
    <input type="text" class="form-value" id="rua" name="rua">

    <label class="form-label">Nº:</label>
    <input type="number" class="form-value" id="num" name="num">

    <label class="form-label">BAIRRO:</label>
    <input type="text" class="form-value" id="bairro" name="bairro"> <br>

    <label class="title"> Contatos </label> <br>
    <label class="form-label">CELULAR:</label>
    <input type="number" class="form-value" id="celular" name="celular">

    <label class="form-label">EMAIL:</label>
    <input type="email" class="form-value" id="email" name="email"><br>

    <label class="form-label">FOTO:</label>
    <input type="file" accept="image/*" class="form-value" id="image" name="imageFornecedor"><br>

    <div class="btns">
    <input type="reset" value="Limpar" class="btn1"> <br>
    <input type="submit" value="Cadastrar" class="btn2"> <br>
    <a href="consultFornecedor.php"><input type="button" value="Consultar" class="btn3"></a>
    </div>
   </form>

  </div>
</section>



<?php 

if(!empty($_POST)) {

   $nome = $_POST['nome'];
   $cnpj = $_POST['cnpj'];
   $rg = $_POST['rg'];
   $cep = $_POST['cep'];
   $rua = $_POST['rua'];
   $num = $_POST['num'];
   $bairro = $_POST['bairro'];
   $cidade = $_POST['cidade'];
   $uf = $_POST['estado'];
   $tel = $_POST['celular'];
   $email = $_POST['email'];


  $image = $_FILES['imageFornecedor'];

  $dir = "/imgs/fornecedores/";

  date_default_timezone_set('America/Sao_Paulo');

  $extensao = strtolower(substr($image['name'], -4));

  $new_name = date("Y.m.d-H.i.s") . $extensao;

  move_uploaded_file($imagem['tmp_name'], $dir.$new_name);

  $caminhoIMG = $dir.$new_name;

  include_once('../conexao.php');

   try {

    $stmt = $conn->prepare("INSERT INTO tb_fornecedor(nm_fornecedor, cnpj_fornecedor, rg_fornecedor, cep_fornecedor, nm_cidade, nm_estado, nm_rua, nr_logradouro, nm_bairro, tl_fornecedor, nm_email, img_fornecedor) 
    VALUES (:nome, :cnpj, :rg, :cep, :cidade, :uf, :rua, :num, :bairro, :celular, :email, :imagem)");

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cnpj', $cnpj);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':uf', $uf);
    $stmt->bindParam(':rua', $rua);
    $stmt->bindParam(':num', $num);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':celular', $tel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':imagem', $caminhoIMG);

    $stmt->execute();

     echo "<script>alert('Cadastrado no banco de dados com sucesso!'); window.location.href='consultFornecedor.php';</script>";

    } catch(PDOException $e) {
       echo "Erro ao cadastrar no banco de dados: " . $e->getMessage();
      }


 }


?> 

  </body>
</html>