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
    <title>ALTERAR DADOS CLIENTE</title>
    
    
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/menu.css">

     
   <script type="text/javascript" src="/js/buscaCEP.js"></script>
   <script type="text/javascript" src="/js/validaCPF.js"></script>

   
   


  </head>
  <body background="#f9f4e3">

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
  
<label class="page-title">ALTERAR DADOS CLIENTE</label>
  
  <div class="cad">
   <form method="POST" class="form">

    <label class="form-label">CÓDIGO DO CLIENTE:</label>
    <input type="text" class="form-value" id="codigo" name="codigo" required > <br>

    <label class="form-label"> NOME COMPLETO:</label>
    <input type="text" class="form-value" id="nome" name="nome" value= "<?php echo $selectName ?>" required > <br>

    <label class="title"> Documentos </label> <br>
    <label class="form-label">CPF:</label>
    <input type="number" class="form-value" id="cpf" name="cpf" onblur="TestaCPF(this.value)"  required >
   
    <label class="form-label">RG:</label>
    <input type="number" class="form-value" id="rg" name="rg" required > <br>

    <label class="title"> Endereço residencial </label> <br>

    <label class="form-label">CEP:</label>
    <input type="number" class="form-value" id="cep" name="cep" onblur="pesquisacep(this.value)" required >

    <label class="form-label">CIDADE:</label>
    <input type="text" class="form-value" id="cidade" name="cidade" required >

    <label class="form-label">ESTADO:</label>
    <input type="text" class="form-value" id="uf" name="estado" required > <br>

     <label class="form-label">RUA:</label>
    <input type="text" class="form-value" id="rua" name="rua" required >

    <label class="form-label">Nº:</label>
    <input type="number" class="form-value" id="num" name="num" required >

    <label class="form-label">BAIRRO:</label>
    <input type="text" class="form-value" id="bairro" name="bairro" required > <br>

    <label class="title"> Contatos </label> <br>
    <label class="form-label">CELULAR:</label>
    <input type="number" class="form-value" id="celular" name="celular" required > 

    <label class="form-label">EMAIL:</label>
    <input type="email" class="form-value" id="email" name="email" required ><br>

    <label class="form-label">FOTO:</label>
    <input type="file" accept="image/*" class="form-value" id="image" name="imageCliente" ><br>

    <div class="btns">
    <input type="reset" value="Limpar" class="btn1"> <br>
    <input type="submit" value="Atualizar" class="btn2"> <br>
    <a href="consultCliente.php"><input type="button" value="Voltar" class="btn3"></a>
    </div>
   </form>
    
  </div>
</section>
    


<?php 


if(!empty($_POST)) {

   $nome = $_POST['nome'];
   $cd = $_POST['codigo'];
   $cpf = $_POST['cpf'];
   $rg = $_POST['rg'];
   $cep = $_POST['cep'];
   $cidade = $_POST['cidade'];
   $uf = $_POST['estado'];
   $rua = $_POST['rua'];
   $num = $_POST['num'];
   $bairro = $_POST['bairro'];
   $tel = $_POST['celular'];
   $email = $_POST['email'];
  


  $imagem = $_FILES['imageCliente'];
  $dir = "/imgs/clientes/";

  date_default_timezone_set('America/Sao_Paulo');

  $extensao = strtolower(substr($imagem['name'], -4));

  $new_name = date("Y.m.d-H.i.s") .$extensao;

  move_uploaded_file($image['tmp_name'], $dir.$new_name);

  $caminhoIMG = $dir.$new_name;

  include_once('../conexao.php');

 try {
    
  $stmt = $conn->prepare("UPDATE tb_cliente SET nm_cliente = :nome , cpf_cliente = :cpf, rg_cliente = :rg, cep_cliente = :cep, nm_cidade = :cidade, nm_estado = :uf, nm_rua = :rua, nr_logradouro = :num, nm_bairro = :bairro, tl_cliente = :celular, nm_email = :email, img_cliente = :imagem where cd_cliente = :codigo");

  $stmt->bindParam(':codigo', $cd);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':cpf', $cpf);
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

  echo "<script>alert('Alterado no banco de dados com sucesso!');</script>";
  // header('Location:./consultCliente.php');
  

} catch(PDOException $e) {
  echo "Erro ao cadastrar no banco de dados: " . $e->getMessage();
}

}


?> 

  </body>
</html>