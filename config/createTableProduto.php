<?php
include("../conexao.php");

try{

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

  $conn->query($sql);
  echo "Tabela Produto criado com sucesso";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>