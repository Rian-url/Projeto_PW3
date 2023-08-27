<?php 
$servename = "localhost:3306";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servename", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "CREATE DATABASE bd_sistema;";

  $conn->exec($sql);

  echo "Banco de dados criado com sucesso";
  
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>