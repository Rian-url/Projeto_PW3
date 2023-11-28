<?php 
session_start();    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>

    <section class="container">
        <h2>Seja Bem Vindo(a)</h2>
     <div class="login">
      <form method="POST" class="form"> 
        <img src="./imgs/user.png" alt="user_image" width="245" height="120">
        <br>

        <i class="fa-solid fa-user-tie fa-xl icon_user" style="color: #000;" ></i> <input type="email" name="email" id="email" placeholder="Email" class="inputs" required> <br>
        <i class="fa-solid fa-lock fa-xl icon_password" style="color: #000;" ></i> <input type="password" name="senha" id="senha" placeholder="Senha" class="inputs" required> <br>

        <input type="submit" value="Logar" class="logar">
      </form>
     </div>
    </section>
    
</body>

<script src="https://kit.fontawesome.com/d99d19df5c.js" crossorigin="anonymous"></script>
</html>

<?php 

if(!empty($_POST)) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include_once('conexao.php');

    $rs = $conn->query("SELECT * FROM tb_usuario where nm_email='$email'and 
    nm_senha='$senha'");

    $rs -> execute();

    if($rs->fetch(PDO::FETCH_ASSOC) == true) { 

     $_SESSION["email"] = $email;
     header('Location:php/menu.php');
    }
    else {
     echo"<script>
     alert('Nome de usuário ou senha incorreto');
     </script>";
    }

    // if(($email == "user@teste.com" && $senha == "0101")) {
    //     $_SESSION['usuario'] = $email;
    //     header('Location:./php/menu.php');
    // } else {
    //     session_destroy();
    //     echo"<script> alert('Acesso negado!');</script>";
    // }
}

?>