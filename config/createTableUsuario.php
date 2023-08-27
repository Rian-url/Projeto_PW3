<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "bd_sistema";

try{
$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password); 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sql = "create table tb_usuario(
  cd_usuario int PRIMARY KEY AUTO_INCREMENT,
  nm_usuario varchar(50) not null,
  nm_email varchar(30) not null,
  nm_senha varchar(30) not null);";

  $conn->exec($sql);
  echo "Tabela Usuario criado com sucesso";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>