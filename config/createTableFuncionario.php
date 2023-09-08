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
  
  $sql = "create table tb_funcionario(
  cd_funcionario int PRIMARY KEY AUTO_INCREMENT,
  nm_funcionario varchar(40) not null,
  nm_cargo varchar(30) not null,
  cpf_funcionario varchar (11) not null,
  rg_funcionario varchar (9) not null,
  cep_funcionario varchar (8) not null,
  nm_cidade varchar (35) not null,
  nm_estado varchar (35) not null,
  nm_rua varchar (35) not null,
  nr_logradouro varchar (4) not null,
  nm_bairro varchar (35) not null,
  tl_funcionario varchar(11) not null,
  nm_email varchar (40) not null,
  img_funcionario varchar (100) );";

  $conn->exec($sql);
  echo "Tabela Funcionario criada com sucesso";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>