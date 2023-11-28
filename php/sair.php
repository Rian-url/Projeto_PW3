<?php 
session_start();
session_unset();
session_destroy();

echo "<script>alert('DESCONECTADO COM SUCESSO');</script>";
header( "refresh:0;url=http://localhost/" );
?>