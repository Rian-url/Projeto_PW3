<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "sistema";

try{
$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password); 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sql = "create table tb_produto(
  cd_produto int PRIMARY KEY AUTO_INCREMENT,
  nm_produto varchar(50) not null,
  nm_cor varchar(20) not null,
  vl_peso decimal(4,2) not null,
  nm_material varchar(20) not null,
  nr_quantidade int not null,
  ds_produto varchar(20) not null,
  vl_produto decimal(4,2) not null,
  vl_custo decimal(4,2) not null);";

  $conn->exec($sql);
  echo "Tabela Produto criado com sucesso";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>