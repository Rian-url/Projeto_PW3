<?php 
$servename = "localhost:3306";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servename; dbname=bd_sistema", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "Banco de dados conectado com sucesso";
} catch(PDOException $e) {
  echo "Falha na conexão: " . $e->getMessage();
}
?>