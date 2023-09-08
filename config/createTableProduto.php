<?php
$servername = "localhost:3306";
$username = "root";
// $password = "root";

// meu servidor
$password = "tubas1234";

$dbname = "bd_sistema";

try{
$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password); 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sql = "create table tb_produto(
  cd_produto int PRIMARY KEY AUTO_INCREMENT,
  nm_produto varchar(50) not null,
  nm_cor varchar(20) not null,
  vl_peso decimal(6,2) not null,
  nm_material varchar(20) not null,
  nr_quantidade int not null,
  nm_categoria varchar(20) not null,
  vl_produto decimal(8,2) not null,
  vl_custo decimal(8,2) not null,
  img_produto varchar (100) );";

  $conn->exec($sql);
  echo "Tabela Produto criado com sucesso";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>