<?php
session_start();
include("db.php");

if(!isset($_SESSION['evento_id'])){
header("Location: dashboard.php");
}

$msg="";

if($_POST){

$nomeOriginal = $_FILES['arquivo']['name'];
$extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);

// gera nome único
$novoNome = uniqid().".".$extensao;

$destino = "uploads/".$novoNome;

move_uploaded_file($_FILES['arquivo']['tmp_name'], $destino);

$conn->query("INSERT INTO participacoes
(usuario_id,evento_id,arquivo,descricao)
VALUES(
'{$_SESSION['user']['id']}',
'{$_SESSION['evento_id']}',
'$novoNome',
'{$_POST['descricao']}'
)");

$msg="Enviado com sucesso!";
}
?>