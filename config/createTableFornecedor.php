<?php
include("../conexao.php");

try{

  
  $sql = "create table tb_fornecedor(
  cd_fornecedor int PRIMARY KEY AUTO_INCREMENT,
  nm_fornecedor varchar(50) not null,
  cnpj_fornecedor varchar (14) not null,
  rg_fornecedor varchar (9) not null,
  cep_fornecedor varchar (8) not null,
  nm_cidade varchar (35) not null,
  nm_estado varchar (35) not null,
  nm_rua varchar (20) not null,
  nr_logradouro varchar (4) not null,
  nm_bairro varchar (35) not null,
  tl_fornecedor  varchar (11) not null,
  nm_email varchar (40) not null,
  img_fornecedor varchar (100) );";

  $conn->query($sql);
  echo "Tabela Fornecedor criada com sucesso";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>