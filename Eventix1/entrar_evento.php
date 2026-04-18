<?php
session_start();
include("db.php");

if($_SESSION['user']['tipo']!="participante"){
header("Location: login.php");
}

$msg="";

if($_POST){
$codigo=$_POST['codigo'];

$res=$conn->query("SELECT * FROM eventos WHERE codigo='$codigo'");

if($res->num_rows>0){
$evento=$res->fetch_assoc();
$_SESSION['evento_id']=$evento['id'];
header("Location: enviar_arquivo.php");
}else{
$msg="Código inválido!";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Entrar Evento</title>
<?php include("estilo.php"); ?>
</head>

<body>

<div class="topo">
<img src="Eventix/logo.png" class="logo">
</div>

<div class="container">
<div class="card">

<form method="POST">
<input name="codigo" placeholder="Código do evento" required>
<button>Entrar</button>
</form>

<p><?php echo $msg; ?></p>

</div>
</div>

</body>
</html>