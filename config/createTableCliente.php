<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "sistema";

try{
$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password); 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PSO::ERRMODE_EXCEPTION);
  
  $sql = "create table tb_cliente(
  cd_cliente int PRIMARY KEY AUTO_INCREMENT,
  nm_cliente varchar(50) not null,
  cpf_cliente varchar(11) not null,
  rg_cliente varchar (9) not null,
  cep_cliente varchar (8) not null,
  nm_cidade varchar (35) not null,
  nm_estado varchar (35) not null,
  nm_rua varchar (35) not null,
  nr_logradouro varchar (4) not null,
  nm_bairro varchar (35) not null,
  tl_cliente varchar(9) not null,
  nm_email varchar (40) not null);";

  $conn->exec($sql);
  echo "Tabela Cliente criado com sucesso";
} catch(PDOEException $e) {
  echo $sql . "<br>" . $e->getMessafe();
}
$conn = null;

?>