<?php
include("../conexao.php");

try{

  
  $sql = "create table tb_usuario(
  cd_usuario int PRIMARY KEY AUTO_INCREMENT,
  nm_usuario varchar(50) not null,
  nm_email varchar(30) not null,
  nm_senha varchar(30) not null,
  nivel_acesso int not null,
  img_usuario varchar (100) );";

  $conn->query($sql);
  echo "Tabela Usuario criada com sucesso";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>