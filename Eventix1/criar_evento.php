<?php
session_start();
include("db.php");

if($_SESSION['user']['tipo']!="organizador"){
header("Location: login.php");
}

$msg="";

if($_POST){
$codigo=strtoupper(substr(md5(rand()),0,6));

$conn->query("INSERT INTO eventos 
(nome_disciplina,professor,descricao,data_evento,localizacao,codigo,organizador_id)
VALUES(
'{$_POST['disciplina']}',
'{$_POST['professor']}',
'{$_POST['descricao']}',
'{$_POST['data']}',
'{$_POST['local']}',
'$codigo',
'{$_SESSION['user']['id']}'
)");

$msg="Evento criado! Código: $codigo";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Criar Evento</title>
<?php include("estilo.php"); ?>
</head>

<body>

<div class="topo">
<img src="Eventix/logo.png" class="logo">
</div>

<div class="container">
<div class="card">

<form method="POST">
<input name="disciplina" placeholder="Disciplina" required>
<input name="professor" placeholder="Professor" required>
<input type="datetime-local" name="data" required>
<input name="local" placeholder="Local" required>
<textarea name="descricao" placeholder="Descrição"></textarea>
<button>Criar</button>
</form>

<p><?php echo $msg; ?></p>

</div>
</div>

</body>
</html>