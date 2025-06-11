<?php
include "conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$datanasc = $_POST["data_nascimento"];
$escolaridade = $_POST["escolaridade"];
$comentario = $_POST["comentario"];

$sql = "INSERT INTO informacoes VALUES ";
$sql .= "('$nome','$email','$telefone','$cidade','$estado','$datanasc','$escolaridade','$comentario')";
$resultado = mysqli_query($conexao,$sql);
echo '<script type="text/javascript">
	  alert("Contato inserido com sucesso!");
	  </script>';
mysqli_close($conexao);
?>